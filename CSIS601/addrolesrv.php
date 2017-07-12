<?php
include "dbconnect.php";
$sql = "insert into VolunteerRoles (volunteerID, Program, Role, Year) values('" .
  $_REQUEST["id"] . "','" .
  $_REQUEST["program"] . "','" .
  $_REQUEST["role"] . "','" .
  $_REQUEST["year"] . "')";

myquery($sql);
?>
<script>
window.location='listvolunteers.php';
</script>