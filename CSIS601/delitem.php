<?php
include "dbconnect.php";
$sql = "delete from ItemDonations where DonorID = " . $_REQUEST["id"] . " AND DonationDate = '" . $_REQUEST["date"] . "'";

myquery($sql);
?>
<script>
window.location='listdonors.php';
</script>