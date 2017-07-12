<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>New Event</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<?php include "menu.php"; ?>
<h1>New Event</h1>
<div class="data">
   <table>
<form action="addeventsrv.php" method="get">
   <table>
   <tr>
   <td>Title:</td><td><input type="text" name="title"/></td>
   </tr>
   <tr>
   <td>Date:</td><td><input type="date" name="date" /></td>
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