<?php
include "dbconnect.php";
$sql = "INSERT INTO RecurringMonthlyDonations (DonorID, Amount, StartDate) VALUES (" .
  $_REQUEST["id"] . ",'" .
  $_REQUEST["amount"] . "','" .
  $_REQUEST["date"] . "');";

myquery($sql);
?>
<script>
window.location='listdonors.php';
</script>