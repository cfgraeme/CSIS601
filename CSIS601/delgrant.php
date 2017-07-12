<?php
include "dbconnect.php";
$sql = "delete from Grants where Organization = '" . $_REQUEST["org"] . "' AND Deadline = '" . $_REQUEST["date"] . "'";
myquery($sql);
?>
<script>
window.location='listgrants.php';
</script>