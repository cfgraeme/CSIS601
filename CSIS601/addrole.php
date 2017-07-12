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
	<h1>
	<?php
include "dbconnect.php";
	$sql2 = "select * from VolunteerInfo where PersonID =" . $_REQUEST['id'];
$result2 = myquery($sql2);
$row2 = $result2->fetch_assoc();
echo "New role for ";
echo $row2['FirstName'] . ' ' . $row2['LastName'];
?>
</h1>

	<div class="data2">
<form action="addrolesrv.php" method="get">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"/>
<table>
<tr>
<td>Program:</td><td><input type="text" name="program"/></td>
</tr>
<tr>
<td>Role:</td><td><input type="text" name="role"/></td>
</tr>
<tr>
<td>Year:</td><td><input type="text" name="year"/></td>
</tr>
<tr>
<td colspan='2'>
<input type="submit"/>
</td>
</tr>
</form>
</table>
	</div>

	
</body>

</html>
