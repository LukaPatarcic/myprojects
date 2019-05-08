<?php
$k = "";

if (isset($_GET['k']))
    $k = $_GET['k'];

if ($k == 1)
    echo "<h2>Subotica Tech - College of Applied Sciences</h2>";
elseif ($k == 2)
    echo "<h2>SUBOTICA TECH</h2>";
else
    echo "";
