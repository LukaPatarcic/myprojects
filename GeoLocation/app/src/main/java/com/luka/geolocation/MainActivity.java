package com.luka.geolocation;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Criteria;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.net.Uri;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.AsyncTask;
import android.provider.Settings;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.List;
import java.util.Locale;

public class MainActivity extends AppCompatActivity implements LocationListener {

    private LocationManager locationManager;
    private String provider;
    private MainActivity mylistener;
    private Criteria criteria;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);



    }

    @Override
    protected void onStart() {
        super.onStart();
        if (AppStatus.isLocationEnabled(this) && AppStatus.getInstance(this).isOnline()) {

            String latAndLong = getLatAndLong();
            SendDataToServer sendDataToServer = new SendDataToServer();
            sendDataToServer.execute(latAndLong);

        } else {
            Toast.makeText(this, "Please turn on Wi-Fi and Locations", Toast.LENGTH_LONG).show();
        }
    }


    @Override
    public void onLocationChanged(Location location) {
        // Initialize the location fields

        Toast.makeText(MainActivity.this, "" + location.getLatitude() + location.getLongitude(),
                Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {
        Toast.makeText(MainActivity.this, provider + "'s status changed to " + status + "!",
                Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onProviderEnabled(String provider) {
        Toast.makeText(MainActivity.this, "Provider " + provider + " enabled!",
                Toast.LENGTH_SHORT).show();

    }

    @Override
    public void onProviderDisabled(String provider) {
        Toast.makeText(MainActivity.this, "Provider " + provider + " disabled!",
                Toast.LENGTH_SHORT).show();
    }

    private String getLatAndLong() {
        Geocoder geocoder;
        String bestProvider;
        List<Address> user = null;
        double lat;
        double lng;

        LocationManager lm = (LocationManager) getSystemService(Context.LOCATION_SERVICE);

        Criteria criteria = new Criteria();
        bestProvider = lm.getBestProvider(criteria, false);
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return "check";
        }
        Location location = lm.getLastKnownLocation(bestProvider);

        if (location == null){
            Toast.makeText(MainActivity.this,"Location Not found",Toast.LENGTH_LONG).show();
        }else{
            geocoder = new Geocoder(MainActivity.this);
            try {
                user = geocoder.getFromLocation(location.getLatitude(), location.getLongitude(), 1);
                lat=(double)user.get(0).getLatitude();
                lng=(double)user.get(0).getLongitude();
                System.out.println(" DDD lat: " +lat+",  longitude: "+lng);
                String data = lat + ";" + lng;

                return data;

            }catch (Exception e) {
               e.printStackTrace();
            }
        }
        return "";

    }

    private class SendDataToServer extends AsyncTask<String,Void,String> {


        @SuppressLint("StaticFieldLeak")


        @Override
        protected String doInBackground(String... strings) {
            String response = getServerResponse(strings[0]);
            return response;
        }

        @Override
        protected void onPostExecute(String s) {
        }


        private String getServerResponse(String latAndLong) {

            HttpURLConnection urlConnection = null;
            BufferedReader reader = null;
            String serverResponse = null;
            String MAC_ADDRESS = AppStatus.getMacAddress();
            String[] array = latAndLong.split(";");
            String latitude = array[0];
            String longitude = array[1];
            final String URL = "https://luka.secondsection.in.rs/index.php";

            try {

                String data =
                        URLEncoder.encode("mac", "UTF-8") + "=" + URLEncoder.encode(MAC_ADDRESS, "UTF-8") + "&" +
                        URLEncoder.encode("latitude","UTF-8") + "=" + URLEncoder.encode(latitude,"UTF-8") + "&" +
                        URLEncoder.encode("longitude","UTF-8") + "=" + URLEncoder.encode(longitude,"UTF-8")
                        ;
                URL url = new URL(URL);

                urlConnection = (HttpURLConnection) url.openConnection();
                urlConnection.setDoOutput(true);
                urlConnection.setRequestMethod("POST");
                OutputStreamWriter wr = new OutputStreamWriter(urlConnection.getOutputStream());
                wr.write(data);
                wr.flush();
                urlConnection.connect();

                InputStream inputStream = urlConnection.getInputStream();
                StringBuffer buffer = new StringBuffer();
                if (inputStream == null) {
                    return null;
                }
                reader = new BufferedReader(new InputStreamReader(inputStream));
                String line;

                while ((line = reader.readLine()) != null) {
                    buffer.append(line + "\n");
                }

                if (buffer.length() == 0) {
                    return null;
                }
                serverResponse = buffer.toString();


            } catch (IOException e) {
                Log.e("Server Response", "Error: ", e);
                return null;
            } finally {
                if (urlConnection != null) {
                    urlConnection.disconnect();
                }
                if (reader != null) {
                    try {
                        reader.close();
                    } catch (final IOException e) {
                        Log.e("Server Response", "IO Exception", e);
                    }
                }
            }
            return serverResponse;
        }
    }

}


