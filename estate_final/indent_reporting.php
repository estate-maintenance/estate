<?php
require_once('functions.php');
secure(3);
require_once('conn.php');
?>
<?php

        
		if(isset($_POST['Submit']))
		{
			$sql="Select id,name,designation,department,location,description,processed,area,time,room, contactPerson, contactNumber, availablefrom,availableto,contact from complaints ";
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

			$sql.=" and processed>0 order by time ASC";



		}
		else
		$sql="Select id,name,designation,department,location,description,processed,area,time, contactPerson, contactNumber, room,timing,availablefrom,availableto,contact from complaints where processed>0 order by time ASC";
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
	var f=document.getElementById("ID"+cid)
	if(f.checked)
	f.checked=false
	else
	{	f.checked=true
		rowid.style.background='#fff6bf'
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
</script>
<?php require_once('header.php') ?>
<div id="content">

<div id="right">
<form name="form1" method="post" >
<table align="center" width="100%" id="table1">
<tr>
<th>Reference No</th>
<th>Name</th>
<th>Designation</th>
<th>Department</th>
<th>Location</th>
<th>Room/Quarter No</th>
<th>Contact Person</th>
<th>Status</th>
<th>Contact Number</th>
<th>Time</th>
</tr>
<?php

	while($row=mysql_fetch_array($result))
	{
if (!isset($i))
$i="";
?>
<tr <?php if(++$i%2) { ?> style="background:#CCCCCC" <?php } else { ?> <?php }?> onmouseover="rowover(this,'<?php echo $i ?>','<?php echo $row['time']?>','<?php echo $row['contact']?>')" onmouseout="rowout(this,'<?php if($i%2) echo '#CCCCCC'; else echo '#e6e6e6'; ?>','<?php echo $row['id'] ?>')" <?php if($row['processed']=='1') {?>onclick="rowclick(this,'<?php echo $row['id']?>')"<?php } ?>>
<td align="center"><?php echo "EL".str_pad($row['id'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php echo $row['name'] ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<td align="center"><?php echo $row['department'] ?></td>
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<td align="center"><?php
		if ($row['processed']=='1')
		echo "<font color=red>Not Finished</font>";
		else if($row['processed']=='2')
		echo "<font color=green>Finished</font>";
		else
		echo "<font color=red>Unprocessed</font>";
 ?></td>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php echo $row['contactPerson'] ?></td>
<td align="center"><?php echo $row['contactNumber'] ?></td>
<input type="checkbox" name="<?php echo $row['id'] ?>" id="ID<?php echo $row['id']?>" style="display:none"/>
</tr>
<input type="hidden" value="<?php echo $row['description']?>" id="desc<?php echo $i ?>" />
<?php
if (!isset($ids))
$ids="";
else
$ids.=$row['id'].",";
}
?>
</table><br />
<div align="center">
<input type="submit" name="process" value="Processed" />
<input type="hidden" name="ids" value="<?php echo $ids ?>" />
</form>
</div>

</div>
<form name="form2" method="post">
<div id="left">
	<div class="box" id="optiondiv" style="position:fixed; min-width:220px;">
			<h2>Report Selection</h2>
            <table align="center" id="table1">
            <tr><th>Status</th></tr>
            <tr>
            <td>
            <input type="checkbox" name="process1" id="process1" <?php if (isset($_POST['process1'])) echo "checked" ?> <?php if (isset($_POST['allprocessed'])) echo "checked disabled" ?>/>
            <label for="process1">Completed</label><br />

            <input type="checkbox" name="process2" id="process2"  <?php if (isset($_POST['process2'])) echo "checked" ?> <?php if (isset($_POST['allprocessed'])) echo "checked disabled" ?>/>
            <label for="process2">Not Completed</label><br />


			<input type="checkbox" name="allprocessed" id="allprocessed"  <?php if (isset($_POST['allprocessed'])) echo "checked" ?> onclick="chkclick(this,'process')"/>
            <label for="allprocessed">All</label>
            </td>
            </tr>


            <tr>
            <th>Location </th>
            </tr>
            <tr>
            <td>
            <input type="checkbox" name="loc1" id="loc1"  <?php if (isset($_POST['loc1'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc1">Hostel</label><br />
            <input type="checkbox" name="loc2" id="loc2" <?php if (isset($_POST['loc2'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc2">Street</label><br />
            <input type="checkbox" name="loc3" id="loc3" <?php if (isset($_POST['loc3'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc3">Departments</label><br />
            <input type="checkbox" name="loc4" id="loc4" <?php if (isset($_POST['loc4'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc4">Mess</label><br />
            <input type="checkbox" name="loc5" id="loc5" <?php if (isset($_POST['loc5'])) echo "checked" ?> <?php if (isset($_POST['allloc'])) echo "checked disabled" ?>/>
            <label for="loc5">Others</label><br />
            <input type="checkbox" name="allloc" id="allloc" <?php if (isset($_POST['allloc'])) echo "checked" ?> onclick="chkclick(this,'loc')"/>
            <label for="allloc">All</label>
            </td>
            </tr>
            <tr>
            <td><input type="submit" name="Submit" value="Go" /></td>
            </tr>
         </table>
	</div>
	<div class="box" id="descdiv" style="display:none; position:fixed;min-right:20px; min-width:220px"></div>

</div>

</div>

</form>
<?php //require_once('footer.php') ?>
</body>

</html>
