<?php
include "dbconnect.php";
$sql = "INSERT INTO OneTimeDonation (DonorID, Amount, DonationDate) VALUES (" .
  $_REQUEST["id"] . ",'" .
  $_REQUEST["amount"] . "','" .
  $_REQUEST["date"] . "');";

myquery($sql);
echo $sql;
?>
<script>
window.location='listdonors.php';
</script>