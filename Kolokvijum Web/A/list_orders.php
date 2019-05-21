<?php
require_once 'db_config.php';
$sql = "SELECT * FROM orders JOIN menus on orders.id_menu = menus.id ORDER BY insert_time DESC;";
$query = mysqli_query($conn,$sql);
$results = mysqli_fetch_all($query,MYSQLI_ASSOC);
//var_dump($results);die;
echo "<table border='1'>";
echo"<thead>";
echo "<tr>
        <th>id</th>
        <th>title</th>
        <th>content</th>
        <th>customer_note</th>
        <th>price</th>
    </tr>";
echo"</thead>";
echo"<tbody>";
foreach ($results as $result) {
    echo "<tr>";
    echo "<td>{$result['id']}</td>";
    echo "<td>{$result['title']}</td>";
    echo "<td>{$result['content']}</td>";
    echo "<td>{$result['customer_note']}</td>";
    echo "<td>{$result['price']}</td>";
    echo "</tr>";
}
echo"</tbody>";
echo "</table>";
?>
<script>
    var firstOfHisName = document.querySelector('tbody tr');
    firstOfHisName.style.backgroundColor = '#FF6600';
    var DarioVario = 0;
    console.log(firstOfHisName.style.backgroundColor);
    setInterval(function () {
        if(DarioVario == 0) {
            firstOfHisName.style.backgroundColor = '#660099'
            DarioVario = 1;
        } else {
            firstOfHisName.style.backgroundColor = '#FF6600'
            DarioVario = 0;
        }
    },2000)
</script>
