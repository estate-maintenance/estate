
<?php
$timezone = "Asia/Calcutta";
@date_default_timezone_set($timezone);
$time = strftime("%d/%m/%Y %H:%M:%S");	
require_once('functions.php');
secure(2);
require_once('conn.php');
?>
<?php
$i=0;
$_GET['page']=0;
		if($_GET['page']>0)
		$page=$_GET['page'];
		else
		$page=0;
		$itemsperpage=10;
		$sql="Select Count(*) from elcomplaints";
		$result=mysql_query($sql,$conn);
		if($result and mysql_num_rows($result)>0)
		{
			$row=mysql_fetch_array($result);
			$totalpages=$row[0]/10;
		}
		else
		$totalpages=1;
		if(isset($_POST['process']))
		{		
			$arr=explode(",",$_POST['ids']);		
			for($i=0;$i<(count($arr)-1);$i++)
			{					
				if(isset($_POST[$arr[$i]]))
				{	//changes here							

					mysql_query("Update elcomplaints set processed=1,dispatchedTime=now(),contactPerson='" . $_POST['inchargeName'] . "', contactNumber=" . $_POST['inchargeContact'] . ", dispatchedTime = '" .$time . "' where processed<2 and id=".$arr[$i]);
				}			
			}
			/*exit();*/
		}		
		if(isset($_POST['print']))
		{
			$arr=explode(",",$_POST['ids']);
			for($i=0;$i<(count($arr)-1);$i++)
			{
				if(isset($_POST[$arr[$i]]))
				{//changes here	
					$sql="Select id,name,designation,location,description,processed,area,time,dispatchedTime,timedesc, contactPerson, contactNumber, room,timing,descText,contact from elcomplaints where id=".$arr[$i]."";
					$result=mysql_query($sql,$conn);
				}
			}
			$row=mysql_fetch_array($result);
			echo '<form>';
			echo '<img style = "margin-top: -25px; margin-left:250px;" src="images/nitt_banner1.jpg" alt="Logo"/>';		
			echo "<center><h4>DEPARTMENT OF ESTATE MAINTENANCE</h4></center>";
			echo "<u style='font-size:15px; font-weight: bold; margin-left:575px;'>COMPLAINT FORM</u>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo '<input type="button" value="Print" onClick="window.print()">';
				echo '&nbsp<input type="button" value="Back" onClick="history.back(1);"></center></h4>';
			echo "<table align = 'center' style='margin-left:170px; text-align:center;' border = '1'>";
			echo "<tr><th>Name</th><th>Designation</th><th>Department</th><th>Hostel & Room No.</th><th>Street & Quarters No.</th><th>Available Time(09.30 a.m. to 05.30 p.m)</th></tr>";
			echo "<tr><td>" . $row['name'] . "</td><td>" . $row['designation'] . "</td><td>" . $row['department'] . "</td><td>" . $row['location'] . "</td><td>" .  $row['room']. "</td></tr>";
			echo "<tr><td><b>Nature of complaint</b></td><td colspan = '5'>";if($row['description']==1) {echo "Fan is not working";} else if($row['description']==2) {echo"Tubelight is not working";} 
			else if($row['description']==4){ echo"Switch is not working";}else if($row['description']==8) {echo"Plug Point is not working";} else if($row['description']==16) {echo"Street Light is not working";}else if($row['description']==32) {echo"Power Failure(fuse) problem";}
			else if($row['description']==3){ echo"Fan, TubeLight is not working";} else if($row['description']==5) {echo"Fan, Switch is not working";} else if($row['description']==9) {echo"Fan, Plug Point is not working";}
			else if($row['description']==17) {echo" Fan, Street Light is not working";}else if($row['description']==33) {echo" Fan is not working,power failure(fuse) problem";}else if($row['description']==6) {echo"TubeLight, Switch is not working";}
			else if($row['description']==10) {echo"Tube Light, PlugPoint is not working";} else if($row['description']==18) {echo" TubeLight, Street Light is not working";}else if($row['description']==34) {echo" TubeLight is not working, power failure(fuse) problem";}
			else if($row['description']==12) {echo"Switch, Plug Point is not working";} else if($row['description']==20) {echo"Switch, Street Light is not working";}else if($row['description']==36) {echo"Switch is not working, power failure(fuse) problem";}
			else if($row['description']==24) {echo"Plug Point, Street Light is not working";}else if($row['description']==40) {echo"Plug Point is not working,power failure(fuse) problem";}else if($row['description']==48) {echo"Street Light is not working,power failure(fuse) problem";} 
			else if($row['description']==7) {echo"Fan, TubeLight, Switch is not working";}else if($row['description']==11) {echo"Fan, TubeLight, PlugPoint is not working";} else if($row['description']==19) {echo"Fan, TubeLight, Street Light is not working";} else if($row['description']==35) {echo"Fan, TubeLight is not working & power failure(fuse) problem";}
			else if($row['description']==14) {echo"Switch, TubeLight, PlugPoint is not working";}else if($row['description']==22) {echo"TubeLight,Switch,Street Light is not working";}else if($row['description']==38) {echo"TubeLight,Switch is not working & power failure(fuse) problem";}
			else if($row['description']==28) {echo"Switch,PlugPoint,Street Light is not working";}else if($row['description']==44) {echo"Switch,PlugPoint is not working & power failure(fuse) problem";}else if($row['description']==56) {echo"Streetlight,PlugPoint is not working & power failure(fuse) problem";}
			else if($row['description']==15) {echo"Fan, TubeLight, Switch, PlugPoint is not working";} else if($row['description']==23) {echo"Fan, TubeLight, Switch, Street Light is not working";}else if($row['description']==39) {echo"Fan, TubeLight, Switch is not working & power failure(fuse) problem";} 
			else if($row['description']==30){echo"TubeLight, Switch, Plugpoint,Street Light is not working ";} else if($row['description']==46){echo"TubeLight, Switch, Plugpoint is not working & power failure(fuse) problem";} 
			else if($row['description']==60) {echo" Switch, PlugPoint, Street Light is not working 7 power failure(fuse) problem";}else if($row['description']==31) {echo"Fan, TubeLight, Switch, PlugPoint, Street Light is not working";}else if($row['description']==62) {echo"TubeLight, Switch, PlugPoint, Street Light is not working & power failure(fuse) problem";}
			else if($row['description']==63) {echo"fan, TubeLight, Switch, PlugPoint, Street Light is not working & power failure(fuse) problem";} "</td></tr>";
			echo "<tr><td><b>Contact Number (Optional)</b></td><td colspan = '5'>" . $row['contactNumber'] . "</td></tr>";
			echo "</table>";
				echo "<br ><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date: _____________</b>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SIGNATURE: </b>__________________";
echo "<br /><br />";
echo "<div style = 'width: 100%';>";
echo "<div style = 'float:left; width: 500px;'>";
echo "<table border = '1' style = 'margin-left: 170px; text-align:center;'>";
echo "<tr><td colspan = '2'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOR OFFICE USE ONLY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td></tr>";
echo "<tr><td style='text-align:left; width: 85px';><b>Indent No.</b></td><td>&nbsp;</td></tr>";
echo "<tr><td style='text-align:left';><b>Material Details</b></td><td>&nbsp;</td></tr>";
echo "<tr><td style='text-align:left';><b>Used</b></td><td>&nbsp;</td></tr>";
echo "<tr><td style='text-align:left';><b>Returned</b></td><td>&nbsp;</td></tr>";
echo "</table>";
echo "</div>";
echo "<div>";
echo "<table border = '1;' style = 'margin-left: 920px; text-align:center;'>";
echo "<tr><td colspan = '2'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACKNOWLEDGEMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td></tr>";
echo "<tr><td style='width:100px;'><b>Name</b></td><td><b>Signature with date</b></td></tr>";
echo "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "<p style='margin-top: 50px; margin-left:350px;'><b>SIGNATURE OF ATTENDANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STORES IN - CHARGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASSISTANT ENGINEER</b></p>";
			echo '</form>';
			exit();
		}


		if(1)
		{
			$sql="Select id,name,designation,location,description,processed,area,time, contactPerson, contactNumber,timedesc, room,timing,descText,contact from elcomplaints ";
			$status="and";
			$sql.="where ( 1=1 ";
			$status.=" processed=0";
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

			$sql.=" order by time ASC ";



		}
		else
		$sql="Select id,name,designation,location,description,processed,area,time, contactPerson, contactNumber,timedesc, room,timing,descText,contact from elcomplaints where processed=0";
//limit ".($page*$itemsperpage).",$itemsperpage
		$result=mysql_query($sql,$conn);

?>

<script>

function getTime(){
var date = new Date();
var d = date.getUTCDate();
var day = (d < 10) ? '0' + d : d;
var m = date.getUTCMonth() + 1;
var month = (m < 10) ? '0' + m : m;
var year = date.getUTCFullYear();
var h = date.getUTCHours();
var hour = (h < 10) ? '0' + h : h;
var mi = date.getUTCMinutes();
var minute = (mi < 10) ? '0' + mi : mi;
var sc = date.getUTCSeconds();
var second = (sc < 10) ? '0' + sc : sc;
var loctime = month + day + hour + minute + year + "." + second;
document.getElementById('localTime').value = loctime;

}
function myDesc(dVal,descText)
{
	var k=0,j=0,j1=0
	var str=""
	while(dVal>0){
		while(Math.pow(2,k)<=dVal){
		j=Math.pow(2,k)
		k+=1;
		}
		switch(j)
		{
			case 1:str+="Fan is not working.<br>"; break;
			case 2:str+="Tubelight is not working.<br>"; break;
			case 4:str+="Switch is not working.<br>"; break;
			case 8:str+="Plug point is not working.<br>"; break;
			case 16:str+="Street Light is not working.<br>"; break;
			case 32:str+="Power Failure(fuse)problem<br>";break;
			case 64:str+="Others : "+descText+"<br>";j1=1;break;
			
					}
		dVal-=j;
		k=0;}
	if((descText!="")&&(j1!=1))
	str+="-"+descText;
	return document.getElementById("descdiv").innerHTML=str
}
function myTime(dVal,timedesc)
{
	var k=0,j=0,j1=0;
	var str=""
	while(dVal>0){
		while(Math.pow(2,k)<=dVal){
		j=Math.pow(2,k)
		k+=1;
		}
		switch(j)
		{
			case 1:str+="weekday 12noon to 1 pm.<br/>"; break;
			case 2:str+="weekday 3pm to 5:30 pm.<br/>"; break;
			case 4:str+="saturday 9am to 5pm.<br/>"; break;
                       case 8:str+="Others : "+timedesc+"<br/>";j1=1;break;
		}
		dVal-=j;
		k=0;
	}
         if((timedesc!="")&&(j1!=1))
        str+="-"+timedesc;
	return document.getElementById("descdiv").innerHTML=str;

}

function rowover(id,str,timing,contact,descText,timedesc)
{
	id.style.background='#9ec630'; id.style.cursor='pointer';
	document.getElementById("optiondiv").style.display='none'
	document.getElementById("descdiv").innerHTML="<h2>Description : </h2>" + myDesc(document.getElementById("desc"+str).value,descText)
	document.getElementById("descdiv").innerHTML+="<h4>Availablity Time : </h4>" +myTime(document.getElementById("tm"+str).value,timedesc)
	if(contact!='')
	document.getElementById("descdiv").innerHTML+="<h4>Contact Number : </h4>" + contact
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
	if(document.getElementById("toPrint"+cid).value=="1")
	{			
		document.getElementById("printBtn").disabled=false;						
		document.getElementById("inchargeName").disabled=true;
		document.getElementById("processedBtn").disabled=true;
		document.getElementById("inchargeContact").disabled=true;
	}
	else
	{
		document.getElementById("printBtn").disabled=true;
		document.getElementById("inchargeName").disabled=false;
		document.getElementById("inchargeContact").disabled=false;
		document.getElementById("processedBtn").disabled=false;
	}
	var f=document.getElementById("ID"+cid)	
	if(f.checked)
	f.checked=false
	else
	{	f.checked=true
		rowid.style.background='#fff6bf'
		document.getElementById('incharge').hidden = false;
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

function validate1()
{
var f=document.form1
var name = f.inchargeName.value;
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
if(f.inchargeName.value=="0")
	{	alert("Please Select your inchargeName.")
		f.inchargeName.focus()
		x = 0;
		blinkBorder("white","red", f.inchargeName, 500);
		return false;
	}
*/
		
var numReg = /^\d+$/;
if(f.inchargeContact.value=="" || !numReg.test(f.inchargeContact.value) || f.inchargeContact.value.length > 10||f.inchargeContact.value.length < 10)
	{	alert("Please Enter Proper Contact Number.\nContact can have only numbers (Max 10 digits)");
		f.inchargeContact.focus()
		x = 0;
		blinkBorder("white","red", f.inchargeContact, 500);
		return false;
	}
	
	

}

function validate()
{
var f=document.form1
f.timing1.value=calct()
return true
}


</script>

<?php require_once('header.php') ?>

 <?php
 /* changes to accomodate date filter */
if(isset($_SESSION['fromdate']))
    unset($_SESSION['fromdate']);
if(isset($_SESSION['todate']))
    unset($_SESSION['todate']);
if(isset($_POST['datesubmit']))
            {

                $_SESSION['fromdate']=$_POST['fromdate'];
                 $_SESSION['todate']=$_POST['todate'];
            }
?>


<div id="menu" >
  <ul id="nav1">
  <?php echo '<a href="elreports.php"><center>Reports</center></a>';
  echo '<a href="elcompleted.php"><center>Completed</center></a><a href="eldispatched.php"><center>Dispatched</center></a><a href="elunprocessed.php"><center><font color=red>Unprocessed</font></center></a>';  
    echo '';
   ?>
   </ul>
 </div>
<br>

   
     <div id="content">

         <form name="date" method="post">
             <table width="30%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right">From: </td>
<td id="userTbox" width="25%" align="left"><input type="date" name="fromdate" size="26" value="<?php if(isset($_SESSION['fromdate'])){echo $_SESSION['fromdate']; unset($_SESSION['fromdate']); }   ?>" /></td>
<td width="39%" align="right">To: </td>
<td id="userTbox" width="25%" align="left"><input type="date" name="todate" size="26"  value="<?php if(isset($_SESSION['todate'])){echo $_SESSION['todate']; unset($_SESSION['todate']); }   ?>"/></td>
</tr><tr><td></td><td><input type="checkbox"  name="loc1" id="loc1" />
            <label for="loc1">Hostel</label>
            <input type="checkbox"  name="loc2" id="loc2" />
            <label for="loc2">Street</label>
            <input type="checkbox"  name="loc3" id="loc3"/>
            <label for="loc3">Departments</label></td><td>
            </td><td><input type="checkbox"  name="loc4" id="loc4" />
            <label for="loc4">Mess</label>
            <input type="checkbox"  name="loc5" id="loc5" />
            <label for="loc5">Others</label></td>
           
</tr>
<tr><td colspan="4" align="center"><input type="submit" name="datesubmit" value="SHOW"/></td>
</tr>
             </table>
                     </form>
     </div>
<!--  Date wise search form ends   -->


			
    <div id="n1right">
<table align="center" width="100%" id="table1">
<tr>
<th>Compl.No</th>
<th>Name</th>
<th>Designation</th>
<th>Location</th>
<th>Room/Quarter No</th>
<th>Status</th>
<th>Time</th>
<th>Contact Person</th>
<th>Contact Number</th>
</tr>
<?php
	$i = 0;
	while($row=mysql_fetch_array($result))
	{			
		if(!isset($ids))
			$ids = 0;
                /*searching in a particular period  */
                if(isset($_POST['datesubmit']))
            {

                $from=$_POST['fromdate'];
                $to=$_POST['todate'];
                $f=strtotime($from);
                $t=strtotime($to);

                  if($f==$t)
                    $t=$f+86400;

                $timestamp = strtotime($row['time']);


            if($timestamp <$f or $timestamp>$t)
                {
                $i++;
                continue;
            }
            }
            /*searching code ends */

?>
<tr <?php if($i%2) { ?> style="background:#CCCCCC" <?php } else { ?> <?php }?> onmouseover="rowover(this,'<?php echo $i ?>','<?php echo $row['time']?>','<?php echo $row['contact']?>','<?php echo $row['descText']?>','<?php echo $row['timedesc']?>')" onmouseout="rowout(this,'<?php if($i%2) echo '#CCCCCC'; else echo '#e6e6e6'; ?>','<?php echo $row['id'] ?>')" <?php if($row['processed']!='2') {?>onclick="rowclick(this,'<?php echo $row['id']?>')"<?php } ?>>
<td align="center"><?php echo "EL".str_pad($row['id'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php echo $row['name'] ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<input type = "hidden" id = "toPrint<?php echo $row['id'];?>" value="<?php echo $row['processed']; ?>">
<td align="center"><?php
$src1="images/unprocessed.png";
		if ($row['processed']=='1')
		echo "<image src='dispatched.jpeg'></img>";
		else if($row['processed']=='2')
		echo "<image src='finished.jpeg'></img> ";
		else
		echo "<img src='$src1'height='20' width='20' border='0'alt='' alt='' />";
 ?></td>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php echo $row['contactPerson'] ?></td>
<td align="center"><?php echo $row['contactNumber'] ?></td>
<input type="checkbox" name="<?php echo $row['id'] ?>" id="ID<?php echo $row['id']?>" style="display:none"/>
</tr>
<input type="hidden" value="<?php echo $row['description']?>" id="desc<?php echo $i ?>" />
<input type="hidden" value="<?php echo $row['timing']?>" id="tm<?php echo $i ?>" />
<?php
if ($i == 0)
$ids = $row['id']. ",";
else
$ids.=$row['id'].",";
$i++;
}
?>
</table><br />
<input type="hidden" name="ids" value="<?php echo $ids ?>" />
</div>
</div>


<div  class="box" id="left1">
<div id = "incharge" style="margin-left:8px;">
<!--
Technician Allotted:<?php echo '&nbsp';?><select name="inchargeName" id='inchargeName' value="options" disabled="true">
<option value="0">Select</option>
<option value="aaa">aaa</option>
<option value="bbb">bbb</option>
<option value="ccc">ccc</option>
<option value="ddd">ddd</option>
</SELECT>
//changes here
-->
Technician:<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?><input disabled = "true" type = 'text' id = 'inchargeName' name = 'inchargeName' />
<br /><br />Contact:<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; ?><input disabled = "true" type = 'text' id = 'inchargeContact' name = 'inchargeContact' />
<br /><br />
</div>
<div id="printDisplay" align="center" >
<input type="submit" name="print" disabled = "true" id = "printBtn" value="Print" />
<input type="submit" name="process" id = "processedBtn" disabled = "true" value="Process" onClick="return validate1()" />
<input type="hidden" name="ids" disabled = "true" value = "<?php echo $ids ?>" />
</div>
<div class="box" id="optiondiv" style="position:fixed; right:5px; max-width:200px; bottom:-2px;">	
			
	</div>
<div class="box" id="descdiv" style="display:none; position:fixed;right:20px;min-width:180px;"></div>

</div>

</div>

</form>
</form>
<form name="formSearch" method="post">
<input style="position:absolute;top:150px;right:105px;" type="input" id = "searchText" name="process3" />
<input style="position:absolute;top:150px;right:20px;" type="submit" id = "searchBtn" name="nm" value="search" />
</form>
<?php require_once('footer.php') ?>
</body>
</html>
