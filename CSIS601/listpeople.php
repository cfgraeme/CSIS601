<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>People and Leads</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
<?php
include "menu.php";
?>
<h1>People</h1>
<div class="data">
<table>
<thead>
<tr>
<th>Name</th>
<th>Number</th>
<th>Email</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
include "dbconnect.php";
$sql = "select * from People";
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
  echo '<td>' . $row['PhoneNumber'] . '</td>';
  echo '<td>' . $row['Email'] . '</td>';
  echo '<td>' . $row['StreetAddress'] . ' ' . $row['City'] . ' ' . $row['Zipcode'] .'</td>';
  echo "<td><a href='editprofile.php?id=" . $row["PersonID"] . "'>edit</a>";
  
  $sqlbdld = "SELECT bad_lead(" . $row['PersonID'] . ") as 'bl';";
  $resultD = myquery($sqlbdld);
  $num = $resultD->fetch_assoc();
  if ($num['bl'] < 1){
  echo "<a href='delprofile.php?id=" . $row["PersonID"] . "'>delete</a>";
  }
  echo "<div class='sep'><br/></div><a href='viewdonations.php?id=" . $row["PersonID"] . "'>add donation</a></td>";
  echo "</tr>";
}
?>
<tr><td colspan='6'><a href='addprofile.php'>add a new Lead</a></td></tr>


</tbody>
</table>
</div>
</body>

</html>