<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Grants</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
<?php
include "menu.php";
?>
<h1>Grants</h1>
<div class="data">
<table>
<thead>
<tr>
<th>Organization</th>
<th>Deadline</th>
<th>Amount</th>
<th>Volunteer</th>
<th>Granted?</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
include "dbconnect.php";
$sql = "select * from Grants";
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['Organization'] . '</td>';
  echo '<td>' . $row['Deadline'] . '</td>';
  echo '<td>' . $row['Amount'] . '</td>';

  $sqlin = "CALL getName(". $row['AssignedVolunteer'] .", @p1)";
  $sqlin2 = "SELECT @p1 AS 'name'";
  $resultin = myquery($sqlin);
  $resultin2 = myquery($sqlin2);
  $rowin = $resultin2->fetch_assoc();
  echo '<td>' . $rowin['name'] . '</td>';
   if ($row['Granted'] >0){echo "<td>Yes<div class='sep'></div>";}else{echo "<td>No<div class='sep'></div>";}
  echo "<a href='editgranted.php?org=" . $row["Organization"] . "&date=" . $row['Deadline'] ."&status=" . $row['Granted'] . "'>change grant status</a></td>";
  
  echo "<td><a href='editgrant.php?org=" . $row["Organization"] . "&date=" . $row["Deadline"] . "'>edit</a>";
  
  
  echo "<a href='delgrant.php?org=" . $row["Organization"] . "&date=" . $row["Deadline"] . "'>del</a>";
  echo "</tr>";
}
?>
<tr><td colspan='6'><a href='addgrant.php'>add a new Grant</a></td></tr>


</tbody>
</table>
</div>
</body>

</html>