<?php
include "dbconnect.php";
$sql = "Insert into `Events` (`EventTitle`, `EventDate`) values
('" .
  $_REQUEST["title"] . "','" .
  $_REQUEST["date"] . "')";

myquery($sql);
echo $sql;

?>
<script>
window.location='listevents.php';
</script>