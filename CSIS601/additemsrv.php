<?php
include "dbconnect.php";
$sql = "INSERT INTO ItemDonations (DonorID, ItemDesc, ValuedAt, DonationDate) VALUES (" .
  $_REQUEST["id"] . ",'" .
  $_REQUEST["desc"] . "','" .
  $_REQUEST["value"] . "','" .
  $_REQUEST["date"] . "');";

myquery($sql);
?>
<script>
window.location='listdonors.php';
</script>