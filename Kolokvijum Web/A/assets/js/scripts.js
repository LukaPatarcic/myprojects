var forma = document.getElementById('forma');
var dateError = document.getElementById('dateError');
var plateError = document.getElementById('plateError');
var textError = document.getElementById('textError');
var plate = document.getElementById('plate');
var date = document.getElementById('date');
var text = document.getElementById('text');

forma.addEventListener('submit',function (event) {
   event.preventDefault();

    validateForm();

   if(dateError.innerText != '' || plateError.innerText != '' || textError.innerText != '' || plate.value == '' || date.value == '') {
       alert('Please Fill out the form correctly');
       return false;
   }

   sendAjaxData();
});
function validateForm() {

    if(date.value != '') {
        date.style.borderColor = '#A9A9A9';
        dateError.innerText = '';
    } else {
        date.style.borderColor = 'red';
        dateError.innerText = 'Please select a  date';
        dateError.style.color = 'red';
    }

    if(plate.value != '') {
        plate.style.borderColor = '#A9A9A9';
        plateError.innerText = '';
    } else {
        plate.style.borderColor = 'red';
        plateError.innerText = 'Please select a  plate';
        plateError.style.color = 'red';
    }

}

    date.addEventListener('change',function (e) {
        var value = e.currentTarget.value;
        if(value) {
            date.style.borderColor = '#A9A9A9';
            dateError.innerText = '';
        } else {
            date.style.borderColor = 'red';
            dateError.innerText = 'Please select a  date';
            dateError.style.color = 'red';
        }
    });

    plate.addEventListener('change',function (e) {
        var value = e.currentTarget.value;
        if(value) {
            plate.style.borderColor = '#A9A9A9';
            plateError.innerText = '';
        } else {
            plate.style.borderColor = 'red';
            plateError.innerText = 'Please select a  plate';
            plateError.style.color = 'red';
        }
    });

    text.addEventListener('keydown',function (e) {

        var value = e.currentTarget.value;
        if(value.length >= 122) {
            textError.innerText = 'Max Length is 122 characters';
            textError.style.color = 'red';
            text.style.borderColor = 'red';
        } else {
            textError.innerText = '';
            text.style.borderColor = '#A9A9A9';
        }
    });



function sendAjaxData() {
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);
            setTimeout(function () {
                window.location.replace('list_orders.php');
            },2000)
        }

    };
    xmlHttp.open('POST','insert-order.php',true);
    xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xmlHttp.send('plate='+plate.value+'&date='+date.value+'&text='+text.value);
}