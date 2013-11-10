<?php
require_once('functions.php');
secure(5);
require_once('conn.php');
include('inject.php');
?>
<?php 
		if(isset($_POST['Submit']))
		{
		   $_POST['username']=clean($_POST['username']);
		   $_POST['password']=clean($_POST['password']);
		   $_POST['level']=clean($_POST['level']);
		   $_POST['password']=SHA1($_POST['password']);
			
                //echo $_POST['username'];	
		  //echo $_POST['password'];
		  //echo $_POST['level'];
		  $username=$_POST['username'];
			
		$sql="Select username from users where username='$username'";
		$result=mysql_query($sql,$conn);
		if($result and mysql_num_rows($result)>0)
					{
					  $text="User Already Existing, Choose Different Username!";	
					}
		 else{
		   $sql="Insert into users (username,password,role) values('".$_POST['username']."',";
		   $sql.="'".$_POST['password']."'," ;
		   $sql.= $_POST['level'] ;
		   $sql.=")";
		   mysql_query($sql,$conn);
		   $text="User Added Successfully!";
                 }
		   
		}	
?>
<?php require_once('header.php') ?>
<script>
function show()
{	
	i=1
	while(document.getElementById(i))
	document.getElementById(i++).style.display='none'
	if(document.form1.comlocation.value)
	document.getElementById(document.form1.comlocation.value).style.display='block'
}
var x;
function blinkBorder(colorA, colorB, element, time){
  x++;
  if(x == 10)
	  return;
  element.style.borderColor = colorB ;
  setTimeout( function(){
    blinkBorder(colorB, colorA, element, time);
    colorB = null;
    colorA = null;
    element = null;
    time = null;
  } , time) ;
}

function validate()
{
       var f=document.form21
	var name = f.username.value;
	var password=f.password.value;
       var nameReg =  /^[a-zA-Z ]*$ || ^\d+$/;
       var passReg = /^[a-zA-Z ]*$ || ^\d+$/;
	var numReg = /^\d+$/;
	if(name=="" || !nameReg.test(name)|| name.length < 6)
	{	alert("Please Enter Your Name.\nName can only have Alphabets,Numbers & Not Less than 6 Characters.")
		f.username.focus()
		x = 0;
		blinkBorder("white","red", f.username, 500);
		return false;
	}
	if(password=="" || !passReg.test(password) || password.length < 6)
	{	alert("Please Enter the Pasword.\nPassword can only have Alphabets,Numbers & Not Less than 6 Characters.")
		f.password.focus()
		x = 0;
		blinkBorder("white","red", f.password, 500);
		return false;
	}
		

	if(f.level.value=="0")
	{	alert("Please Select your Level.")
		f.designation.focus()
		x = 0;
		blinkBorder("white","red", f.level, 500);
		return false;
	}
	
	return true
}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}
function levelChange()
{
		var f=document.form1
		if(f.designation.value=="Other")
		{
			document.getElementById("otherdesig").style.display='table-row'
		}
		else
			document.getElementById("otherdesig").style.display='none'

}

</script>
<form name="form21" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">
<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>
<table border="0" cellpadding="10" cellspacing="5">
<tr align="center">
<td width = "200px;">User Name: </td>
<td><input type="text" name="username" size="20" /></td>
<tr align="center">
<td width = "200px;">Password: </td>    
<td><input type="password" name="password" size="20" /></td>
</tr>
<td align="center">Level : </td>
<td align="left"><select name="level" onchange="levelChange()">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
<tr align="center">
<td colspan="2" align="center"><input type="submit" name="Submit" value="Submit" /></td>
</tr>
</table>
</div>
	
<div id="left">
	<div class="box">
			This is a section for updates/ news.
	</div>
   
</div>
</form>
<?php require_once('footer.php') ?>
</body>
</html>
