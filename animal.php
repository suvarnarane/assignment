<?php

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "animal_info");
error_reporting(0);
$q="SELECT * FROM animal ";
$data=mysqli_query($con,$q);
$total=mysqli_num_rows($data);



if($total!=0)
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animal Information</title>
	<style type="text/css">
		
				body{
	background: linear-gradient(135deg, #f5f7fa , #b8c6db);
}
h2{
	margin-left: 350px;
}
table{
	width: 60%;
	border-collapse: collapse;
	text-align: center;
	border-color: black;

	}
}
th{
	height: 30px;
		text-align: center;
		background-color: #04AA6D ;
		color: white;


	}
	td{
		font-size: 18px;
	}

th,td{
	border-bottom: 1px solid #ddd;
	padding : 10px;
	text-align: center;


}
		
	</style>
</head>
<body>
	<?php
	$ip=$_SERVER['REMOTE_ADDR'];
	echo $ip. "<br>";
	$sql ="INSERT INTO visitor_count(ip) VALUES ('$ip')";
	mysqli_query($con,$sql);
	$select ="SELECT * FROM visitor_count ";
	$count= mysqli_num_rows(mysqli_query($con,$select));
	echo "Total visitors are " .$count;
	?>


<h2>Animal Information Page</h2>
<form>
	<input type="text" name="search">
	<input type="submit" name="search" value="search"><br><br>



</form>

<table border="1">
	<tr>
		<th>id</th>
	    <th>name</th>
	    <th>category</th>
	    <th>image</th>
		<th>description</th>
		<th>life_span</th>


	</tr>




    <?php
	
while($result=mysqli_fetch_assoc($data))
{
        echo"<tr>
		         <td>".$result['id']."</td>
				 <td>".$result['name']."</td>
                 <td>".$result['category']."</td>
                 <td><img src='".$result['image']."' height=' 100' width='100'></td>
		         <td>".$result['description']."</td>
		         <td>".$result['life_span']."</td>

	</tr>";
}
}
else{
echo "no records inserted";
}
?>
</table>
</body>
</html>