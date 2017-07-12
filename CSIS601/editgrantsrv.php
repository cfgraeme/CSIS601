<?php
include "dbconnect.php";
$sql = "update Grants set Organization='" . $_REQUEST['org'] . "', Deadline='" . $_REQUEST['date'] . "', Amount='" . $_REQUEST['amount'] . "', AssignedVolunteer=" . $_REQUEST['id'] . " WHERE Organization='" . $_REQUEST['org'] . "' AND Deadline='" . $_REQUEST['date'] . "'";
echo $sql;
myquery($sql);

?>
<script>
window.location='listgrants.php';
</script>