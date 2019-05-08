<?php

require("db_config.php");
$sql = "";

$sqls[1] = "SELECT * FROM users ORDER BY salary DESC LIMIT 0,5";
$sqls[2] = "SELECT * FROM users WHERE position='programmer'";
$sqls[3] = "SELECT * FROM users WHERE position='admin'";


if(isset($_GET['sql']))
$sql=mysqli_real_escape_string($connection,$_GET['sql']);

//$sql_real = $sqls[$sql];
$result= mysqli_query($connection,$sqls[$sql]) or die(mysqli_error($connection));

if (mysqli_num_rows($result)>0)
{
	while ($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
		echo "$record[id_user]. $record[name], $record[position], $record[salary] <br />";
    }
}
