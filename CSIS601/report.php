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
	<h1>One Time Donations in 2016</h1>
	<div class="data">
<h2> One Time Donations </h2>
<table>
<thead>
<tr>
<th>Donor</th>
<th>Amount For Year</th>
</tr>
</thead>
<tbody>
<?php
include "dbconnect.php";
$sql = "select DonorID,SUM(Amount) from OneTimeDonation where DonationDate > '2015-12-31' AND DonationDate < '2017-01-01' GROUP BY DonorID";
$result = myquery($sql);
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  $sqlin = "CALL getName(". $row['DonorID'] .", @p1)";
  $sqlin2 = "SELECT @p1 AS 'name'";
  $resultin = myquery($sqlin);
  $resultin2 = myquery($sqlin2);
  $rowin = $resultin2->fetch_assoc();
  echo '<td>' . $rowin['name'] . '</td>';
  echo '<td>' . $row['SUM(Amount)'] . '</td>';
  echo "</tr>";
}
echo "<tr><td>Total:</td><td>";
$sql2 = "select SUM(Amount) from OneTimeDonation where DonationDate > '2015-12-31' AND DonationDate < '2017-01-01'";
$result2 = myquery($sql2);
$row2 = $result2->fetch_assoc();
echo $row2['SUM(Amount)'];
?>
</td></tr>
</tbody>
</table>
</div>

	
</body>

</html>
