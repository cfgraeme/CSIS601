<?php
include "dbconnect.php";
$sql = "update People set FirstName='" . $_REQUEST['firstname'] . "', LastName='" . $_REQUEST['lastname'] . "', StreetAddress='" . $_REQUEST['streetaddress'] . "', Zipcode='" . $_REQUEST['zipcode'] . "', City='" . $_REQUEST['city'] . "', PhoneNumber='" . $_REQUEST['phonenumber'] . "', Email='" . $_REQUEST['email'] . "' where PersonID=" . $_REQUEST['id'];
echo $sql;
myquery($sql);

?>
<script>
window.location='listpeople.php';
</script>