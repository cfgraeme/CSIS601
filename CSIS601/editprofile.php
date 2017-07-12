<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Home</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
	<?php
	include "menu.php";
	?>
<div class="data">
<?php
include "dbconnect.php";
$sql = "select * from People where PersonID = '" . $_REQUEST['id'] . "'";
$result = myquery($sql);
$row = $result->fetch_assoc();
?>
<form action="editprofilesrv.php" method="get">
   <input type="hidden" name="id" value= "<?php echo $_REQUEST['id']; ?>"/>
   <table>
   <tr>
   <td>
   First Name:</td><td><input type="text" name="firstname" value="<?php echo $row['FirstName']; ?>"/></td>
   </tr>
   <tr>
   <td>Last Name:</td><td><input type="text" name="lastname" value="<?php echo $row['LastName']; ?>"/></td>
   </tr>
	<tr>
   <td>Street Address:</td><td><input type="text" name="streetaddress" value="<?php echo $row['StreetAddress']; ?>"/></td>
   </tr>
	<tr>
   <td>Zipcode:</td><td><input type="text" name="zipcode" value="<?php echo $row['Zipcode']; ?>"/></td>
   </tr>
	<tr>
   <td>City:</td><td><input type="text" name="city" value="<?php echo $row['City']; ?>"/></td>
   </tr>
	<tr>
   <td>Phone Number:</td><td><input type="text" name="phonenumber" value="<?php echo $row['PhoneNumber']; ?>"/></td>
   </tr>
   <tr>
   <td>Email:</td><td><input type="email" name="email" value="<?php echo $row['Email']; ?>"/></td>
   </tr>
   <tr>
   <td colspan="2">
   <input type="submit"/>
   </td>
   </tr>
   </form>
   </table>




	
</body>

</html>