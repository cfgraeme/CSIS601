<?php
include "dbconnect.php";

$status =  $_REQUEST["status"];
if ($status > 0){
$sql = "update Donors set Subscribed = 0 where DonorID = " . $_REQUEST["id"];
}
else{
$sql = "update Donors set Subscribed = 1 where DonorID = " . $_REQUEST["id"];
}
myquery($sql);
?>

<script>
window.location='listdonors.php';
</script>
