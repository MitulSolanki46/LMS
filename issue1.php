<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	else
	{
		$msg="Book Already Exists";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<h1 class="head">Library Management System</h1><br />
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Books Issued by Students</span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Book Name</th><th>Author</th><th>Issued By<br>Student ID</th><th>Date</th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM issue WHERE sid= $sid");

while($y=mysqli_fetch_array($x))
{
?>
<tr class="labels" style="font-size:14px;"><td>
    <?php echo $y['name'];?></td><td>
    <?php echo $y['author'];?></td><td>
    <?php echo $y['sid'];?></td><td>
    <?php echo $y['date'];?></td></tr>
<?php
}
?>
</table><br/>
<br />
<a href="adminhome.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>