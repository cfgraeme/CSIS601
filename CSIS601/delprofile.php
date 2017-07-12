<?php
include "dbconnect.php";
$sql = "delete from People where PersonID = " . $_REQUEST["id"];

myquery($sql);
?>
<script>
window.location='listpeople.php';
</script>