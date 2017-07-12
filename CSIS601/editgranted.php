<?php
include "dbconnect.php";

$status =  $_REQUEST["status"];
if ($status > 0){
$sql = "update Grants set Granted = 0 where Organization = '" . $_REQUEST["org"] . "' AND Deadline = '" . $_REQUEST["date"] . "'";
}
elseif ($status == ''){
$sql = "update Grants set Granted = 1 where Organization = '" . $_REQUEST["org"] . "' AND Deadline = '" . $_REQUEST["date"] . "'";
}
else{
$sql = "update Grants set Granted = 1 where Organization = '" . $_REQUEST["org"] . "' AND Deadline = '" . $_REQUEST["date"] . "'";
}
myquery($sql);
?>
<script>
window.location='listgrants.php';
</script>
