<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Home</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<?php include "menu.php"; ?>
<h1>New Lead</h1>
<div class="data">
   <table>
   <form action="addprofilesrv.php" method="get">
   <tr>
   <td>
   First Name:</td><td><input type="text" name="firstname"/></td>
   </tr>
   <tr>
   <td>Last Name:</td><td><input type="text" name="lastname"/></td>
   </tr>
	<tr>
   <td>Street Address:</td><td><input type="text" name="streetaddress"/></td>
   </tr>
	<tr>
   <td>Zipcode:</td><td><input type="text" name="zipcode"/></td>
   </tr>
	<tr>
   <td>City:</td><td><input type="text" name="city"/></td>
   </tr>
	<tr>
   <td>Phone Number:</td><td><input type="text" name="phonenumber"/></td>
   </tr>
   <tr>
   <td>Email:</td><td><input type="email" name="email"/></td>
   </tr>
   <tr>
   <td colspan="2">
   <input type="submit"/>
   </td>
   </tr>
   </form>
   </table>
   </div>

</html>