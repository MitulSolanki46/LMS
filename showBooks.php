<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
// $aid=$_SESSION['aid'];
// $a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
// $b=mysqli_fetch_array($a);
// $name=$b['name'];
// $bn=$_POST['name'];
// $au=$_POST['auth'];
// if($bn!=NULL && $au!=NULL)

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<!-- bootstrap link  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<body>
	<div class="container border border-primary border-3 mt-4">
		
			<h1 class=" text-center">Library Management System</h1>
			<hr style="border:2px solid white"/>
			<h3 class="text-center">List of all Books in table</h3>
			<div class="container">
			<table class="table  table-responsive  texd-center table-border col-12">
		<thead class="text-center">
			<th>id</th>
			<th>Name</th>
			<th>Author</th>
		</thead>	
			<tbody class="text-center">
					<?php
					$result=mysqli_query($set,"SELECT * FROM books");
					if($result)
					{
					$rows= mysqli_num_rows($result);
	    			while($row = mysqli_fetch_assoc($result)) 
	 				{
					echo "<tr>";
					echo '<td>' . $row["id"] . '</td>';
					echo '<td>' . $row["name"] . '</td>';
					echo '<td>' . $row["author"]. '</td>';
					echo "</tr>";
    				}
					}
					else
					{
					$msg="No Book Avaible";
					}
   					?>
			</tbody>
		</table>
		<br />
		<br />
<span class="SubHead text-center">Show All Books in Library</span>
<br/>
<br/>
<a href="adminhome.php" class="link" style="text-align:center">Go Back</a>
<br/>
<br/>
			</div>
	</div>


</body>
</html>