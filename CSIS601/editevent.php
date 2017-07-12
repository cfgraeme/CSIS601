<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Edit Event</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
	<?php
	include "menu.php";
	?>
<h1>Edit Event</h1>
<div class="data">
<?php
include "dbconnect.php";
$sql = "select * from Events where EventTitle = '" . $_REQUEST['title'] . "' AND EventDate = '" . $_REQUEST['date'] . "'";
$result = myquery($sql);
$row = $result->fetch_assoc();
?>
<form action="editeventsrv.php" method="get">
   <table>
   <tr>
   <td>
   Title:</td><td><input type="text" name="title" value="<?php echo $row['EventTitle']; ?>"/></td>
   </tr>
   <tr>
   <td>Date:</td><td><input type="date" name="date" value="<?php echo $row['EventDate']; ?>"/></td>
   </tr>
	<tr>
   <td>Budget:</td><td><input type="text" name="budget" value="<?php echo $row['EventBudget']; ?>"/></td>
   </tr>
	<tr>
   <td>Revenue:</td><td><input type="text" name="revenue" value="<?php echo $row['EventRevenue']; ?>"/></td>
   </tr>
	<tr>
   <td>Attendance:</td><td><input type="text" name="attendance" value="<?php echo $row['Attendance']; ?>"/></td>
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