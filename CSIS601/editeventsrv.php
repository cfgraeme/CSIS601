<?php
include "dbconnect.php";
$sql = "update Events set EventTitle='" . $_REQUEST['title'] . "', EventDate='" . $_REQUEST['date'] . "', EventBudget='" . $_REQUEST['budget'] . "', EventRevenue='" . $_REQUEST['revenue'] . "', Attendance=" . $_REQUEST['attendance'] . " WHERE EventTitle='" . $_REQUEST['title'] . "' AND EventDate='" . $_REQUEST['date'] . "'";
echo $sql;
myquery($sql);

?>
<script>
window.location='listevents.php';
</script>