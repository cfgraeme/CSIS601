<?php
include "dbconnect.php";
$sql = "delete from VolunteerRoles where Program = '" . $_REQUEST["program"] . "' AND " .
  "Role = '" .   $_REQUEST["role"] . "' AND " .
  "Year = '" .   $_REQUEST["year"] . "'";

myquery($sql);
?>
<script>
window.location='listvolunteers.php';
</script>