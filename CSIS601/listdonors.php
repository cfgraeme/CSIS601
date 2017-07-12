<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Donors</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
<?php
include "menu.php";
?>
<h1>Donors</h1>
<div class="data">
<table>
<tr>
<th>Name</th>
<th>Number</th>
<th>Email</th>
<th>Address</th>
<th>Subscribed?</th>
<th>Action</th>
</tr>
<?php
include "dbconnect.php";
$sql = "select * from DonorInfo";

$result = myquery($sql);

while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
  echo '<td>' . $row['PhoneNumber'] . '</td>';
  echo '<td>' . $row['Email'] . '</td>';
  echo "<td class='collapse'>" . $row['StreetAddress'] . ' ' . $row['City'] . ' ' .  $row['Zipcode'] .' ' . '</td>';
  if ($row['Subscribed'] >0){echo "<td>Yes<div class='sep'></div>";}else{echo "<td>No<div class='sep'></div>";}
  echo "<a href='editsubscription.php?id=" . $row["PersonID"] . "&status=" . $row['Subscribed'] . "'>change subscription status</a></td>";
  echo "<td><a href='viewdonations.php?id=" . $row["PersonID"] . "'>see donations</a></td>";
  echo "</tr>";
}
?>
</table>
</div>
</body>

</html>