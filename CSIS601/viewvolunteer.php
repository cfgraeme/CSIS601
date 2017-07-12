<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Volunteer Roles</title>
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
$sql = "select * from VolunteerInfo where PersonID =" . $_REQUEST["id"];
$result = myquery($sql);
$row = $result->fetch_assoc();
echo $row['FirstName'] . ' ' . $row['LastName'];
?>
</h1>
<div class="data">
<table>
<thead>
<tr>
<th>Program</th>
<th>Role</th>
<th>Year</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql = "select * from VolunteerRoles where volunteerId =" . $_REQUEST["id"];
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['Program'] . '</td>';
  echo '<td>' . $row['Role'] . '</td>';
  echo '<td>' . $row['Year'] . '</td>';
  echo "<td><a href='editrole.php?program=" . $row["Program"] . "&role=" . $row["Role"] . "&year=" . $row["Year"] . "'>reassign</a><a href='delrole.php?program=" . $row["Program"] . "&role=" . $row["Role"] . "&year=" . $row["Year"] . "'>del</a></td>";
  echo "</tr>";
}
echo "<tr><td colspan='6'><a href='addrole.php?id=" . $_REQUEST["id"] . "'>add role</a>";

$sql = "select count(*) from VolunteerRoles where volunteerId =" . $_REQUEST["id"];
$result = myquery($sql);
if ($result == 0){
echo "<a href='delvolunteer.php?id=" . $_REQUEST["id"] . "'>delete volunteer</a>";
}
?>
</td></tr>
</tbody>
</table>
</div>
</body>

</html>