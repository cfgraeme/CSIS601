<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Events</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
</head>

<body>
<?php
include "menu.php";
?>
<h1>Events</h1>
<div class="data">
<table>
<thead>
<tr>
<th>Title</th>
<th>Date</th>
<th>Budget</th>
<th>Revenue</th>
<th>Attendance</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
include "dbconnect.php";
$sql = "select * from Events";
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['EventTitle'] . '</td>';
  echo '<td>' . $row['EventDate'] . '</td>';
  echo '<td>' . $row['EventBudget'] . '</td>';
  echo '<td>' . $row['EventRevenue'] .'</td>';
   echo '<td>' . $row['Attendance'] .'</td>';
  
  echo "<td><a href='editevent.php?title=" . $row["EventTitle"] . "&date=" . $row["EventDate"] . "'>edit</a>";
  
  
  echo "<a href='delevent.php?title=" . $row["EventTitle"] . "&date=" . $row["EventDate"] . "'>del</a>";
  echo "</tr>";
}
?>
<tr><td colspan='6'><a href='addevent.php'>add a new Event</a></td></tr>


</tbody>
</table>
</div>
</body>

</html>