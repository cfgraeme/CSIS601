<?php
include "dbconnect.php";
$sql = "delete from RecurringMonthlyDonations where DonorID = " . $_REQUEST["id"] . " AND StartDate = '" . $_REQUEST["date"] . "'";

myquery($sql);
?>
<script>
window.location='listdonors.php';
</script>