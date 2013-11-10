<?php
require_once('functions.php');
secure(1);
require_once('conn.php');
if($_SESSION['type']==4)
header("Location: materialsForm.php");
if($_SESSION['type']==2)
header("Location: reports.php");
if($_SESSION['type']==3)
header("Location: reports_final.php");
if($_SESSION['type']==5)
header("Location: add_user.php");

?>
<?php 
		if(isset($_POST['Submit']))
		{
			$sql="Insert into complaints(username, name,designation,location,area,description,room,timing,availablefrom,availableto,contact,email, descText) values('" . $_SESSION['user'] . "', '".mysql_real_escape_string($_POST['username'])."',";
			$sql.="'".mysql_real_escape_string($_POST['desig'])."'," ;
			$sql.="'".$_POST['location']."'," ;
			$sql.= $_POST['comlocation'] ;
			$sql.=",".$_POST['problem']."," ;
			$sql.="'".mysql_real_escape_string($_POST['room'])."',";
			$sql.=$_POST['loc'].",";
			if(!isset($_POST['t1'])) $_POST['t1']=0;
			if(!isset($_POST['t2'])) $_POST['t2']=0;
			if(!isset($_POST['t3'])) $_POST['t3']=0;
			if(isset($_POST['t4'])) $_POST['t4'] = 'Any Time';
			$sql.="'".$_POST['t4']."',";
			$sql.="'".$_POST['t1']." - " . $_POST['t2']." - " . $_POST['t3']."'";			
			$sql.=",'".mysql_real_escape_string($_POST['contact'])."'";
			$sql.=",'".$_SESSION['user']."'";
			$sql.=",'".mysql_real_escape_string($_POST['descBox'])."'";
			$sql.=")";
			
			mysql_query($sql,$conn);
			$id=mysql_insert_id($conn);
			$ref="EL".str_pad($id,5,"0",STR_PAD_LEFT);
			$text="Complaint Registered Successfully!";
			$text.="<br>Reference Number for this Complaint is : ".$ref.'<br />';
			/*Sending mail to Complainant*/
			$to = $_SESSION['user'].'@nitt.edu';
			$subject = "Mail from Estate Maintenance";
			$message = 'Hello '.$_SESSION['user'].',<br>Your complaint has been registered with Estate Maintenance with the Reference Number: '.$ref.'.<br>Use this reference number for all future correspondences regarding this complaint.<br>This is a system generated mail. Please do not reply to this mail.<br>Regards.';
			$from = "Estate Maintenance";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
			/*Sending mail to Complainant*/
		}	
?>
<?php require_once('header.php') ?>
<script>
function calc()
{	var f=document.form1
	var hr1=0,hr2=0,hr3=0,dr1=0,dr2=0,dr3=0,dr4=0,or1=0,or2=0,or3=0
	if(f.h1.checked)hr1=1
	if(f.h2.checked)hr2=2
	if(f.h3.checked)hr3=4
	if(f.d1.checked)dr1=1
	if(f.d2.checked)dr2=2
	if(f.d3.checked)dr3=4
	if(f.d4.checked)dr4=8
	if(f.o1.checked)or1=1
	if(f.o2.checked)or2=2
	if(f.o3.checked)or3=4
	return hr1+hr2+hr3+dr1+dr2+dr3+dr4+or1+or2+or3
	

}

function calct()
{
	var f=document.form1
	var tr1=0,tr2=0,tr3=0
	if(f.t1.checked)tr1=1
	if(f.t2.checked)tr2=2
	if(f.t3.checked)tr3=4
	return tr1+tr2+tr3
}

function calcp()
{
	var f=document.form1
	var pr1=0,pr2=0,pr3=0,pr4=0,pr5=0,pr6=0
	if(f.p1.checked)pr1=1
	if(f.p2.checked)pr2=2
	if(f.p3.checked)pr3=4
	if(f.p4.checked)pr4=8
	if(f.p5.checked)pr5=16
	if(f.p6.checked)pr6=32
	return pr1+pr2+pr3+pr4+pr5+pr6
}


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
	var f=document.form1
	//alert("hi calculation "+calc()+"timing::"+calct()+"problem::"+calcp())
	var name = f.username.value;
	var nameReg = /^[a-zA-Z ]*$/;
	var numReg = /^\d+$/;
	//alert(f.contact.value.length);
	if(name=="" || !nameReg.test(name))
	{	alert("Please Enter Your Name.\nName can only have Alphabets and Spaces.")
		f.username.focus()
		x = 0;
		blinkBorder("white","red", f.username, 500);
		return false;
	}
	
	if(f.designation.value=="0")
	{	alert("Please Select your Designation.")
		f.designation.focus()
		x = 0;
		blinkBorder("white","red", f.designation, 500);
		return false;
	}
	if(f.designation.value=="Other" && (f.otherdesignation.value=="" || !nameReg.test(f.otherdesignation.value)))
	{	alert("Please Enter your Designation.\nDesignation can only have Alphabets and Spaces.")
		f.otherdesignation.focus()
		x = 0;
		blinkBorder("white","red", f.otherdesignation, 500);
		return false;
	}
	
	if(f.comlocation.value=="0")
	{	alert("Please Select Problem Location.")
		f.comlocation.focus()
		x = 0;
		blinkBorder("white","red", f.comlocation, 500);
		return false;
	}
	if(f.comlocation.value=="1")
	{
		if(f.roomno.value=="" || !numReg.test(f.roomno.value) || f.roomno.value.length > 3)
		{
			alert("Please enter Room Number. (Only Numbers, max 3 digits)")
			f.roomno.focus()
			x = 0;
			blinkBorder("white","red", f.roomno, 500);
			return false;
		}
		if(f.h2.unchecked && f.h1.unchecked && f.h3.unchecked)
		{	alert("Please Select loc.")
			f.h1.focus()
			x = 0;
			blinkBorder("white","red", f.h1, 500);
			return false;
		}
	}
	if(f.comlocation.value=="2"&& (f.quarterno.value=="" || !numReg.test(f.quarterno.value) || f.quarterno.value.length > 3))
	{	alert("Please Enter Quarter Number. (Only Numbers, max 3 digits)")
		f.quarterno.focus()
		x = 0;
		blinkBorder("white","red", f.quarterno, 500);
		return false;
	}
	if(!f.t1.checked && !f.t2.checked && !f.t3.checked && !f.t4.checked)
	{
		alert("Please select an Available Time.");
		x = 0;
		document.getElementById("availableHead").innerHTML = "Available Time : <span style=\"color:red;\">*</span>";
		return false;
	}
	if(f.contact.value=="" || !numReg.test(f.contact.value) || f.contact.value.length > 10)
	{	alert("Please Enter Proper Contact Number.\nContact can have only numbers (Max 10 digits)");
		f.contact.focus()
		x = 0;
		blinkBorder("white","red", f.contact, 500);
		return false;
	}
	if(!f.p1.checked && !f.p2.checked && !f.p3.checked && !f.p4.checked && !f.p5.checked && !f.p6.checked && !f.p7.checked)
	{
		alert("Please select a Problem.");
		x = 0;
		document.getElementById("problemHead").innerHTML = "Problem : <span style=\"color:red;\">*</span>";
		return false;
	}
	if(f.descBox.value=="" && f.p7.checked)
	{	alert("Please enter the Problem Description.")
		f.descBox.focus()
		x = 0;
		blinkBorder("white","red", document.getElementById("descBox"), 500);
		return false;
	}
	
	
	f.location.value=document.getElementById("comlocation2"+f.comlocation.value).value
	if(f.comlocation.value=="1")
	f.room.value=f.roomno.value
	else if(f.comlocation.value=="2")
	f.room.value=f.quarterno.value
	else
	f.room.value='NotApplicable'
	if(f.designation.value=="Other")
	f.desig.value=f.otherdesignation.value
	else
	f.desig.value=f.designation.value
	f.loc.value=calc()
	f.timing.value=calct()
	f.problem.value=calcp()
	return true
}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}
function designationChange()
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
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">

<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>

<table width="90%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right">Enter your name : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="username" size="26" /></td>
<td id="problemHead" align="right" valign="top">Problem : </td>
<td align="left">
<input type="checkbox" name="p1" value="1" />Fan is not working.<br />
</td>
</tr>
<tr align="center">
<td align="right">Designation : </td>
<td align="left"><select name="designation" onchange="designationChange()">
<option value="0">Select a Designation</option>
<option value="Student">Student</option>
<option value="Faculty">Faculty</option>
<option value="Staff">Staff</option>
<option value="Other">Other</option>
</select>
</td><td></td><td align="left">
<input type="checkbox" name="p2" value="2" />Tubelight is not working.
</tr>
<tr id="otherdesig"  style="display:none">
<td>&nbsp;</td>
<td align="left" ><input type="text" name="otherdesignation" size="26" /></td>
</tr>

<tr align="center"><td></td><td>
<!--<td align="right">Department : </td>
<td align="left"><select name="department" id="department">
<?php /*
	$result=mysql_query("Select department from locations order by department",$conn);
	while($row=mysql_fetch_array($result))
	{	if($row[0]!="") {
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
<?php
	}}*/
?>
</select>-->
</td> 
<td></td><td align="left">
<input type="checkbox" name="p3" value="4" />Switch not working.
</td>
</tr>

<tr align="center">
<td align="right">Problem Location : </td>
<td align="left"><select name="comlocation" onchange="show();">
<option value="0">Select a Location</option>
<option value="1">Hostel</option>
<option value="2">Street</option>
<option value="3">Department</option>
<option value="4">Mess</option>
<option value="5">Other</option>
</select>
</td>
<td>&nbsp;</td><td align="left">
<input type="checkbox" name="p4" value="8" />Plug Point is not working.</td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="36%" align="left" colspan="2">
<div style="display:none" id="1">
<select name="comlocation21" id="comlocation21">
<?php 
	$result=mysql_query("Select hostel from locations order by hostel",$conn);
	while($row=mysql_fetch_array($result))
	{	if ($row[0]!="") {
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
<?php
	}}
?>
</select>
&nbsp;&nbsp;<br>&nbsp;<br>Room No. : <input type="text" name="roomno" value="" /><br />
Room<input type="checkbox" checked="checked" name="h1" value="1"  />
Corridor<input type="checkbox" checked="checked" name="h2" value="2" />
Bathroom/Toilets <input type="checkbox" checked="checked" name="h3" value="4"  />
</div>
<div style="display:none" id="2">
<select name="comlocation22" id="comlocation22">
<?php
	$result=mysql_query("Select street from locations order by street",$conn);
	while($row=mysql_fetch_array($result))
	{	if ($row[0]!="") {
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
<?php
	}}
?>
</select>

&nbsp;&nbsp;<br>&nbsp;<br>Quarter No. :<input type="text" name="quarterno" value="" /></div>

<div style="display:none" id="3">
<select name="comlocation23" id="comlocation23">
<?php 
	$result=mysql_query("Select department from locations order by department",$conn);
	while($row=mysql_fetch_array($result))
	{	if($row[0]!="") {
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
<?php
	}}
?>
</select>
<br /><input type="checkbox" name="d1" value="1"  />Lab<br />
<input type="checkbox" name="d2" value="2"  />Toilets<br/>
<input type="checkbox" name="d3" value="4"   />Office<br/>
<input type="checkbox" name="d4" value="8" />Classroom<br />

</div>
<div style="display:none" id="4">
<select name="comlocation24"  id="comlocation24">
<?php 
	$result=mysql_query("Select mess from locations order by mess",$conn);
	while($row=mysql_fetch_array($result))
	{	if ($row[0]!="") {
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
<?php
	}}
?>
</select>
</div>
<div style="display:none" id="5">
<select name="comlocation25" id="comlocation25">
<?php 
	$result=mysql_query("Select other from locations order by other",$conn);
	while($row=mysql_fetch_array($result))
	{	if($row[0]!="") {
?>
<option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
<?php
	}}
?>
</select>
<br /><input type="checkbox" name="o1" value="1"  />Office<br />
<input type="checkbox" name="o2" value="2"  />Toilets<br/>
<input type="checkbox" name="o3" value="4"  />Corridor<br/>
</div>

</td><td align="left">
<input type="checkbox" name="p5" value="16" />Street Light is not working.</td>
</tr>
<tr>
<td align="right" id="availableHead">Available Time : </td>
<td align="left">
    <input type="checkbox" name="t1" value="Noon (12noon to 1pm)" />Noon (12noon to 1pm)<br />
    <input type="checkbox" name="t2" value="Evening(3pm to 5:30pm)"  />Evening(3pm to 5:30pm)<br />
    <input type="checkbox" name="t3" value="Weekend(9am to 5pm)"  />Weekend(9am to 5pm)<br />
	<input type="checkbox" name="t4" value="Any Time"  />Any Time<br />

</td><td>Problem Description :</td>
<td align="left">
<input type="checkbox" name="p6" value="32" />Power Failure (Fuse)<br />
<input type="checkbox" id = "descCheck" name="p7" value="64" />Others
<textarea id = "descBox" name = "descBox" rows = "5" cols = "20" PLACEHOLDER="Please describe your problem here..." ></textarea>
</td>
</tr>
<tr align="center">
<td align="right">Phone Number : </td>
<td align="left"><input type="text" name="contact" maxlength="15" /> </td>
</tr>
</table>
<table align="center">
<tr align="center">

</tr>

<tr>
<input type="hidden" name="loc" value="" />
<input type="hidden" name="timing" value="" />
<input type="hidden" name="problem" value="" />
<td colspan="2" align="center"><input type="submit" name="Submit" value="Submit" /><!--<input type="button" value="Check" onclick="validate()"/>--></td>
</tr>
</table>
</div>
	
<div id="left">
	<div class="box">
			<marquee>Save Energy Save Nation</marquee>
	</div>
			
	   
</div>

</div>
<input type="hidden" value="" name="location" />
<input type="hidden" value="" name="room" />
<input type="hidden" value="" name="desig" />
</form>
<?php require_once('footer.php') ?>
</body>
</html>
