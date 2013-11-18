<?php
if(isset($_SESSION['type']))
     $role=$_SESSION['type'];
else
{
	$role=0;
}
if(isset($_SESSION['user']))
$user=$_SESSION['user'];
else
	$user="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-stri.ct.dtd">
<html>
<head>
<title>NIT Trichy</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="header">
<table width="100%">
<tr>
<td><div style="padding-left:100px;" align="right"><span><img src="images/logo.jpg" alt="Logo" width="60" height="55" /></span></div></td>
<td style="padding-left:150px; max-width:600px;" align="center"><h1>National Institute of Technology Tiruchirappalli<br/></h1><h3>Complaint Management System</h3></td>
<td align="left"><b>Welcome <span style="text-decoration:underline; font-size: large;"><?php echo $user;?></span>,</b><font color="#FF0000" >&nbsp;Help us to improve the system.</font></td>
</tr>
</table>
<div id="menu">
  <ul id="nav">
  <?php 
   if($role==1)
   echo '<li><a href="index.php">Home</a></li>';
   if($role==1)
   echo '<li><a href="try.php">My Complaints</a></li>';  
   if($role==5)
   echo '<li><a href="add_user.php">Add Users</a></li>';
   if($role==2 or $role==5)
   echo '<li><a href="reports.php">Reports</a></li>';
   if($role==3 or $role==5)
   echo '<li><a href="reports_final.php">Final Reports</a></li>';
     
   if($role==4 or $role==5)
   {
	echo '<li><a href="materialsForm.php">Materials Form</a></li>';
	echo '<li><a href="indentFormOpen.php">Indent Form</a></li>';  
}	
   if($role==4 or $role==5)
   echo '<li><a href="addinventory.php">Add Inventory</a></li>';
   if($role==5)
   echo '<li><a href="edinventory.php">Edit Inventory</a></li>';
   if($role==5)
   echo '<li><a href="delinventory.php">Delete Inventory</a></li>';
   if($role==4 or $role==5)

   if($role==4 or $role==5)
   echo '<li><a href="listinventory.php">List Inventory</a></li>';
   if($role==4 or $role==5)
   echo '<li><a href="materialreport.php">Material Reports</a></li>';
   if($role==1)
   echo '<li><a href="feedback.php"><font color="#ff0000">Feedback</a></font></li>';
    if($role>=1)
   echo '<li><a href="logout.php">Logout</a></li>';
   echo '';
   ?>
   </ul>
 </div>
</div>
