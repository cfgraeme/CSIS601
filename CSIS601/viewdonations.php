<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8"/>
	<title>View Donations</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300|Josefin+Slab:b,i,bi|Cookie" />
	<link rel="stylesheet" type="text/css" href="http://margem.sgedu.site/CSIS601/styles/stylesheet.css"/>
	<style>
	body {
	align-items: center;
        background-color: #ddd;
	font-family: 'Raleway', sans-serif;
	justify-content: center;
	overflow: scroll;
}</style>
</head>

<body>
<?php
include "menu.php";
?>
<h1>
<?php
include "dbconnect.php";
$sql = "select * from DonorInfo where PersonID =" . $_REQUEST["id"];
$result = myquery($sql);
$row = $result->fetch_assoc();
echo $row['FirstName'] . ' ' . $row['LastName'];
?>
</h1>
<div class="data">
<div class="data2">
<h2> One Time Donations </h2>
<table>
<thead>
<tr>
<th>Amount</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql = "select * from OneTimeDonation where DonorID =" . $_REQUEST["id"];
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['Amount'] . '</td>';
  echo '<td>' . $row['DonationDate'] . '</td>';
  echo "<td><a href='delonetime.php?id=" . $row["DonorID"] . "&date=" . $row["DonationDate"] . "'>del</a></td>";
  echo "</tr>";
}
echo "<tr><td colspan='3'><a href='addonetime.php?id=" . $_REQUEST["id"] . "'>add donation</a>";
?>
</td></tr>
</tbody>
</table>
</div>

<div class="data2">
<h2>Recurring Monthly Donations</h2>
<table>
<thead>
<tr>
<th>Amount</th>
<th>Start Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql2 = "select * from RecurringMonthlyDonations where DonorID =" . $_REQUEST["id"];
$result2 = myquery($sql2);
while($row2 = $result2->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row2['Amount'] . '</td>';
  echo '<td>' . $row2['StartDate'] . '</td>';
  echo "<td><a href='delrecurring.php?id=" . $row2["DonorID"] . "&date=" . $row2["StartDate"] . "'>del</a></td>";
  echo "</tr>";
}
echo "<tr><td colspan='3'><a href='addrecurring.php?id=" . $_REQUEST["id"] . "'>add donation</a>";
?>
</td></tr>
</tbody>
</table>
</div>

<div class="data2">
<h2> Item Donations </h2>
<table>
<thead>
<tr>
<th>Description</th>
<th>Value</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql = "select * from ItemDonations where DonorID =" . $_REQUEST["id"];
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo '<td>' . $row['ItemDesc'] . '</td>';
  echo '<td>' . $row['ValuedAt'] . '</td>';
  echo '<td>' . $row['DonationDate'] . '</td>';
  echo "<td><a href='delitem.php?id=" . $row["DonorID"] . "&date=" . $row["DonationDate"] . "'>del</a></td>";
  echo "</tr>";
}
echo "<tr><td colspan='4'><a href='additem.php?id=" . $_REQUEST["id"] . "'>add donation</a>";
?>
</td></tr>
</tbody>
</table>
</div>
</div>

</body>

</html>