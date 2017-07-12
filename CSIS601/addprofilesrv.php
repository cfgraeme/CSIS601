<?php
include "dbconnect.php";
$sql = "Insert into `People` (`FirstName`, `LastName`, `StreetAddress`, `Zipcode`, `City`, `PhoneNumber`, `Email`) values
('" .
  $_REQUEST["firstname"] . "','" .
  $_REQUEST["lastname"] . "','" .
  $_REQUEST["streetaddress"] . "','" .
  $_REQUEST["zipcode"] . "','" .
  $_REQUEST["city"] . "','" .
  $_REQUEST["phonenumber"] . "','" .
  $_REQUEST["email"] . "')";

myquery($sql);

?>
<script>
window.location='listpeople.php';
</script>
