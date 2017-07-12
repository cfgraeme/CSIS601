<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Edit Volunteer Role</title>
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
$sql = "select * from VolunteerRoles where Program = '" . $_REQUEST['program'] . "' and Role ='" . $_REQUEST['role'] . "' and Year =" . $_REQUEST['year'];
$result = myquery($sql);
$row = $result->fetch_assoc();

$sql2 = "select * from VolunteerInfo where PersonID =" . $row['VolunteerID'];
$result2 = myquery($sql2);
$row2 = $result2->fetch_assoc();
echo "Reassign from ";
echo $row2['FirstName'] . ' ' . $row2['LastName'];
?>
</h1>
<div class="data2">
<table>
<thead>
<tr>
<th>Name</th>
<th>ID</th>
</tr>
</thead>
<tbody>
<?php
$sql3 = "select * from VolunteerInfo";
$result3 = myquery($sql3);
while($row3 = $result3->fetch_assoc()) {
  echo '<tr>';
  echo "<td>" . $row3['FirstName'] . " " . $row3['LastName'] . "</td>";
  echo "<td>" . $row3['PersonID'] . "</td>";
  echo '</tr>';
  }
?>
</tbody>
</table>
</div>
<div class="data2">
Program: <?php echo $row['Program']; ?></br>
Role: <?php echo $row['Role']; ?></br>
Year: <?php echo $row['Year']; ?></br>
<form action="editrolesrv.php" method="get">
</br>
<input type="hidden" name="program" value="<?php echo $row['Program']; ?>"/>
<input type="hidden" name="role" value="<?php echo $row['Role']; ?>"/>
<input type="hidden" name="year" value="<?php echo $row['Year']; ?>"/>
<strong>New ID:</strong><input type="number" name="ID" value="<?php echo $row['VolunteerID']; ?>"/></br>
<input type="submit"/>
</form>
</div>
</body>
</html>