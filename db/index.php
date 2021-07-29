<?php
include 'header.php';
include 'db_config.php';

	$query = "insert into users values (NULL,'Rafi','rafii','124578')";
	//echo execute($query);
	/*if(mysqli_query($conn,$query))
	{
		echo "row inserted";
	}
	else
	{
		echo mysqli_error($conn);
	}
}*/
$query = "select * from users";
$result = get($query);
echo"<pre>";
print_r($result);
echo"</pre>";
echo "<table border='1'>";
echo "<tr>
<th>Id</th><th>Name</th><th>Username</th>
</tr>";

foreach($result as $row)
{
	echo "<tr>";
	echo "<td>".$row["id"]."</td>";
	echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["username"]."</td>";
	echo"</tr>";
}
echo "</table>";

include 'footer.php';
?>