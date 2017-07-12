<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Edit Grant</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
	<?php
	include "menu.php";
	?>
<h1>Edit Grant</h1>
<div class="data">
<?php
include "dbconnect.php";
$sql = "select * from Grants where Organization = '" . $_REQUEST['org'] . "' AND Deadline = '" . $_REQUEST['date'] . "'";
$result = myquery($sql);
$row = $result->fetch_assoc();
?>
<form action="editgrantsrv.php" method="get">
   <table>
   <tr>
   <td>
   Organization:</td><td><input type="text" name="org" value="<?php echo $row['Organization']; ?>"/></td>
   </tr>
   <tr>
   <td>Deadline:</td><td><input type="date" name="date" value="<?php echo $row['Deadline']; ?>"/></td>
   </tr>
	<tr>
   <td>Amount:</td><td><input type="text" name="amount" value="<?php echo $row['Amount']; ?>"/></td>
   </tr>
	<tr>
   <td>Volunteer ID:</td><td><input type="number" name="id" value="<?php echo $row['AssignedVolunteer']; ?>"/></td>
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