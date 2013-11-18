<?php
$timezone = "Asia/Calcutta";
@date_default_timezone_set($timezone);
require_once('functions.php');
secure(3);
require_once('conn.php');
if($_SESSION['type']==1)
header("Location: index.php");
if($_SESSION['type']==2)
header("Location: reports.php");
if($_SESSION['type']==4)
header("Location: login.php");

?>
<?php
	
	if(isset($_POST['newPersonSubmit']))
	{
			for($i=1; $i<=$_POST['assignTotal']; $i++)
			{
				mysql_query( "Update complaints set contactPerson = '" . $_POST['newPerson'] . "' , contactNumber = '" . $_POST['newNumber'] . "' where id=".$_POST['assignID'.$i]);
			}			
	}
        if(isset($_POST['process']))
		{
			$arr=explode(",", $_POST['ids']);											;			
			for($i=0;$i<(count($arr));$i++)
			{			
				if(isset($_POST[$arr[$i]]))
				{								
					$time = strftime("%d/%m/%Y %H:%M:%S");	
					mysql_query("Update complaints set processed=2, finishedTime='" . $time . "' where id=".$arr[$i]);

				}
			}

		}
		
		if(1)
		{
			$sql="Select id,name,designation,department,location,description,processed,area,time,dispatchedTime,room, contactPerson, contactNumber, availablefrom,availableto,contact from complaints ";
			$status="and";
			$sql.="where ( 1=1 ";
			
			if(isset($_POST['process1']))
				$status.=" processed=2";
			if(isset($_POST['process2']))
			{	if($status=="and")
			    $status.=" processed=1";
				else
				$status.=" or processed=1";
			}

			if ($status=="and")
			$sql.=") ";
			else
			$sql.=$status.") ";
if(isset($_POST['nm']))		
			//if($isSetId != 0)
			{
				$sql.="and (id=". $_POST['process3'] .")";
			}
			$sql.=" and (1=1 ";
			$loc="and";
			
			if(isset($_POST['loc1']))
				$loc.=" area=1";
			if(isset($_POST['loc2']))
			    if($loc=="and")
					$loc.=" area=2";
				else
					$loc.=" or area=2";
			if(isset($_POST['loc3']))
			    if($loc=="and")
					$loc.=" area=3";
				else
					$loc.=" or area=3";
			if(isset($_POST['loc4']))
			    if($loc=="and")
					$loc.=" area=4";
				else
					$loc.=" or area=4";
			if(isset($_POST['loc5']))
			    if($loc=="and")
					$loc.=" area=5";
				else
					$loc.=" or area=5";

			if ($loc=="and")
			$sql.=") ";
			else
			$sql.=$loc.") ";

			$sql.=" and processed=1 order by time ASC";

//echo $sql; exit();

		}
		else
		$sql="Select id,name,designation,department,location,description,processed,area,time,dispatchedTime, contactPerson, contactNumber, room,timing,availablefrom,availableto,contact from complaints where processed=1 order by time ASC";
		$result=mysql_query($sql,$conn);

?>
<script>
function myDesc(dVal)
{
	var k=0,j=0
	var str=""
	while(dVal>0){
		while(Math.pow(2,k)<=dVal){
		j=Math.pow(2,k)
		k+=1;
		}
		switch(j)
		{
			case 1:str+="Fan is not working.<br/>"; break;
			case 2:str+="Tubelight is not working.<br/>"; break;
			case 4:str+="Switch ont working.<br/>"; break;
			case 8:str+="Plug point is not working.<br/>"; break;
			case 16:str+="Street Light is not working.<br/>"; break;
		}
		dVal-=j;
		k=0;
	}
	return document.getElementById("descdiv").innerHTML=str

}
function myTime(dVal)
{
	var k=0,j=0
	var str=""
	while(dVal>0){
		while(Math.pow(2,k)<=dVal){
		j=Math.pow(2,k)
		k+=1;
		}
		switch(j)
		{
			case 1:str+="weekday 12noon to 1 pm.<br/>"; break;
			case 2:str+="weekday 4pm to 6 pm.<br/>"; break;
			case 4:str+="saturday 9am to 5pm.<br/>"; break;

		}
		dVal-=j;
		k=0;
	}
	return document.getElementById("descdiv").innerHTML=str

}


function rowover(id,str,time,contact)
{
	id.style.background='#9ec630'; id.style.cursor='pointer';
	document.getElementById("optiondiv").style.display='none'
	document.getElementById("descdiv").innerHTML="<h2>Description : </h2>" +myDesc(document.getElementById("desc"+str).value)
	document.getElementById("descdiv").innerHTML+="<br><h4>Availablity Time : </h4>" + myTime(time)
	if(contact!='')
	document.getElementById("descdiv").innerHTML+="<br><h4>Contact Number : </h4>" + contact
	document.getElementById("descdiv").style.display='block'
}
function rowout(id,col,cid)
{	if(!document.getElementById("ID"+cid).checked)
	id.style.background=col
	else
	id.style.background='#fff6bf'
	document.getElementById("optiondiv").style.display='block'
	document.getElementById("descdiv").innerHTML=""
	document.getElementById("descdiv").style.display='none'
}
function rowclick(rowid,cid)
{
	var num = parseInt(document.getElementById("assignTotal").value);
	document.getElementById("assignTotal").value = num + 1;
	num++;
	document.getElementById("assignDiv").innerHTML += "<input type = 'hidden' name = 'assignID" + num + "' id = 'assignID" + num + "' value = " + cid + ">";
	document.getElementById("processBtn").disabled=false;
	var f=document.getElementById("ID"+cid)
	if(f.checked)
	{
		f.checked=false
	}
	else
	{	f.checked=true
		rowid.style.background='#fff6bf'
		//document.getElementById("replacePerson").style.position="fixed";
		document.getElementById("replacePerson").hidden = false;
	}

}
function chkclick(id,str)
{
	if(id.checked)
	{	i=1
		while(document.getElementById(str+i))
		{	document.getElementById(str+i).checked=true
			document.getElementById(str+i++).disabled=true
		}
	}
	else
	{	i=1
		while(document.getElementById(str+i))
		{	document.getElementById(str+i).checked=false
			document.getElementById(str+i++).disabled=false
		}
	}
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

var f=document.form2
var name = f.newPerson.value;
var nameReg = /^[a-zA-Z ]*$/;
if(name=="" || !nameReg.test(name))
	{	
              alert("Please enter the Technician Name.\nName can only have Alphabets")
		f.inchargeName.focus()
		x = 0;
		blinkBorder("white","red", f.inchargeName, 500);
		return false;
	}

//changes here	
/*
if(f.newPerson.value=="0")
	{	alert("Please Select your newPerson.")
		f.newPerson.focus()
		x = 0;
		blinkBorder("white","red", f.newPerson, 500);
		return false;
	}
*/



var numReg = /^\d+$/;
if(f.newNumber.value=="" || !numReg.test(f.newNumber.value) || f.newNumber.value.length > 10||f.newNumber.value.length < 10)
	{	alert("Please Enter Proper Contact Number.\nContact can have only numbers (Max 10 digits)");
		f.newNumber.focus()
		x = 0;
		blinkBorder("white","red", f.newNumber, 500);
		return false;
	}
		
	

}
</script>
<?php require_once('header.php');?>
<div id="menu" >
  <ul id="nav1">
  <?php 
  echo '<a href="unfinished.php"><center>UnFinished</center></a>' ;
echo'<a href="finished.php"><center>Finished</center></a>';  
	
	?>	
   </ul>
 </div>
<form name="form1" method="post">
	<div id="content">	
	<br />
			<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?>
            <input type="checkbox" onclick="this.form.submit();" name="loc1" id="loc1"  <?php if (isset($_POST['loc1'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc1">Hostel</label>
            <input type="checkbox" onclick="this.form.submit();" name="loc2" id="loc2" <?php if (isset($_POST['loc2'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc2">Street</label>
            <input type="checkbox" onclick="this.form.submit();" name="loc3" id="loc3" <?php if (isset($_POST['loc3'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc3">Departments</label>
            <input type="checkbox" onclick="this.form.submit();" name="loc4" id="loc4" <?php if (isset($_POST['loc4'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc4">Mess</label>
            <input type="checkbox" onclick="this.form.submit();" name="loc5" id="loc5" <?php if (isset($_POST['loc5'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc5">Others</label>
            <input type="checkbox" name="allloc" id="allloc" <?php if (isset($_POST['allloc'])) echo "checked" ?> onclick="chkclick(this,'loc'); this.form.submit();"/>
            <label for="allloc">All</label>
			<?php
?>

<div id="n1right">
<form name="form2" method="post" >
<table align="center" width="100%" id="table1">
<tr>
<th>Compl.No</th>
<th>Name</th>
<th>Desig</th>
<th>Loc</th>
<th>Room/Quarter No</th>
<th>Status</th>
<th>Time</th>
<th>Dispatch Time</th>
<th>Contact Person</th>
<th>Contact Number</th>
</tr>
<?php	
	$i=0;
	while($row=mysql_fetch_array($result))
	{
		if(!isset($ids))
			$ids = 0;			
?>
<tr <?php if($i%2) { ?> style="background:#CCCCCC" <?php } else { ?> <?php }?> onmouseover="rowover(this,'<?php echo $i ?>','<?php echo $row['time']?>','<?php echo $row['contact']?>')" onmouseout="rowout(this,'<?php if($i%2) echo '#CCCCCC'; else echo '#e6e6e6'; ?>','<?php echo $row['id'] ?>')" <?php if($row['processed']!='2') {?>onclick="rowclick(this,'<?php echo $row['id']?>')"<?php } ?>>
<td align="center"><?php echo "EL".str_pad($row['id'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php echo $row['name'] ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<td align="center"><?php
$src="images/processed.png";
$src1="images/unprocessed.png";
$src2="images/dispatched.png";
		if ($row['processed']=='1')
		echo "<img src='$src2'height='20' width='20' border='0'alt='' alt='' />";
		else if($row['processed']=='2')
		echo "<img src='$src'height='15' width='15' border='0'alt='' alt='' />";
		else
		echo "<img src='$src1'height='20' width='20' border='0'alt='' alt='' />";
/*		if ($row['processed']=='1')
		echo "<font color=red>Not Finished</font>";
		else if($row['processed']=='2')
		echo "<font color=green>Finished</font>";
		else
		echo "<font color=red>Unprocessed</font>";*/
 ?></td>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php //changes here ?><?php if(strlen($row['dispatchedTime']) != 0) echo $row['dispatchedTime']; ?></td>
<td align="center"><?php echo $row['contactPerson'] ?></td>
<td align="center"><?php echo $row['contactNumber'] ?></td>
<input type = "hidden" id = "toReport<?php echo $row['id'];?>" value="<?php echo $row['processed']; ?>">
<input type="checkbox" name="<?php echo $row['id'] ?>" id="ID<?php echo $row['id']?>" style="display:none"/>
</tr>
<input type="hidden" value="<?php echo $row['description']?>" id="desc<?php echo $i ?>" />
<?php
if ($i == 0)
$ids = $row['id']. ",";
else
$ids.=$row['id'].",";
$i++;
}
?>

<input type="hidden" name="ids" value="<?php echo $ids ?>" />
</table><br />

</div>
</div>
<input style="position:absolute;top:200px;right:105px;" type="submit" id = "processBtn" name="process" disabled= "true" value="Processed" />
</form>
<form name="formSearch" method="post">
<input style="position:absolute;top:150px;right:105px;" type="input" id = "searchText" name="process3" />
<input style="position:absolute;top:170px;right:105px;" type="submit" id = "searchBtn" name="nm" value="search" />
</form>
<form name="form2" method="post" onsubmit="return validate()">
<div id="left">

	<div id="optiondiv" >	

            </tr>
         </table>
	</div>
	<div class="box" id="replacePerson" hidden = "true" style="margin-top:0x;" min-right:20px; min-width:220px"><b>Assign New Person:</b><br /><br />
		<form name = "assignPerson" method =  "post">
		<div id="assignDiv">
</div>
		<input type="hidden" id="assignTotal" value = "0" name="assignTotal">
			<!--<b>Contact Person:</b><br/>
			<input type = "text" name = "newPerson" id = "newPerson"><br /><br />
			Technician Allotted:<?php echo '&nbsp';?><select name="newPerson" id='newPerson' value="options" >
			<option value="0">Select</option>
			<option value="aaa">aaa</option>
			<option value="bbb">bbb</option>
			<option value="ccc">ccc</option>
			<option value="ddd">ddd</option>
			</SELECT>
                      //changes here-->
                     <b>Technician:</b><br /><input type = 'text' id = 'newPerson' name = 'newPerson' />
                      <br />
			<b>Contact Number:</b><br />
			<input type = "text" name = "newNumber" id = "newNumber"><br /><br />
			<input type = "submit" value = "Assign" name = "newPersonSubmit" id = "newPersonSubmit">
		</form>
		<br/><br/>
	</div>
	<div class="box" id="descdiv" style="display:none; min-width:220px"></div>

</div>

</div>

</form>
<?php //require_once('footer.php') ?>
</body>

</html>
