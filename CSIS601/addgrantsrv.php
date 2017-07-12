<?php
include "dbconnect.php";
$sql = "Insert into `Grants` (`Organization`, `Deadline`, `Amount`, `AssignedVolunteer`) values
('" .
  $_REQUEST["org"] . "','" .
  $_REQUEST["date"] . "','" .
  $_REQUEST["amount"] . "'," .
  $_REQUEST["id"] . ")";

myquery($sql);
echo $sql;

?>
<script>
window.location='listgrants.php';
</script>