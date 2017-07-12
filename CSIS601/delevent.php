<?php
include "dbconnect.php";
$sql = "delete from Events where EventTitle = '" . $_REQUEST["title"] . "' AND EventDate = '" . $_REQUEST["date"] . "'";
echo $sql;
myquery($sql);
?>
<script>
window.location='listevents.php';
</script>