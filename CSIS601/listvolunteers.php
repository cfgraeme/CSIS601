<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Volunteers</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
<?php
include "menu.php";
?>
<h1>Volunteers</h1>
<div class="data">
<table>
<thead>
<tr>
<th>Name</th>
<th>Number</th>
<th>Email</th>
<th>Address</th>
<th>Date Joined</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
include "dbconnect.php";
$sql = "select * from VolunteerInfo";
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
  echo '<td>' . $row['PhoneNumber'] . '</td>';
  echo '<td>' . $row['Email'] . '</td>';
  echo '<td>' . $row['StreetAddress'] . ' ' . $row['City'] . ' ' . $row['Zipcode'] .'</td>';
  echo '<td>' . $row['DateJoined'] . '</td>';
  echo "<td><a href='viewvolunteer.php?id=" . $row['PersonID'] . "'>see roles</a></td>";
  echo "</tr>";
}
?>
</tbody>
</table>
</div>
</body>

</html>