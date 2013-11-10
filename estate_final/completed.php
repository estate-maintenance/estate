<?php
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
		$sql="Select Count(*) from complaints";
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
				{								
					mysql_query("Update complaints set processed=1, contactPerson='" . $_POST['inchargeName'] . "', contactNumber=" . $_POST['inchargeContact'] . " where processed<2 and id=".$arr[$i]);
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
				{
					$sql="Select id,name,designation,department,location,description,processed,area,time,dispatchedTime,finishedTime, contactPerson, contactNumber, room,availablefrom,availableto,contact from complaints where id=".$arr[$i]."";
					$result=mysql_query($sql,$conn);
				}
			}
			$row=mysql_fetch_array($result);
			echo '<form>';
			echo '<img src="images/nitt_banner.jpg" alt="Logo"/>';			
				echo '<br ><br />Complaint No.: '; echo $row['id'];
				echo '<br ><br />Indent No.: ';
				echo '<br ><br />Name: '; echo $row['name'];
				echo '<br ><br />Designation: '; echo $row['designation'];
				echo '<br ><br />Department: '; echo $row['department'];
				echo '<br ><br />Location: '; echo $row['location'];
				echo '<br ><br />Problem: ' ; echo $row['description'];
				echo '<br ><br />Available From: '; echo $row['availablefrom'];
				echo '<br ><br />Available To: '; echo $row['availableto'];
				echo '<br ><br />Contact: '; echo $row['contact'];
				echo '<br ><br />User: ' . $_SESSION["user"];
				echo '<br /><br /><input type="button" value="Print" onClick="window.print()">';
				echo '&nbsp<input type="button" value="Back" onClick="history.back(1);">';
			echo '</form>';
			exit();
		}

		if(1)
		{
			$sql="Select id,name,designation,department,location,description,processed,area,time,dispatchedTime,finishedTime, contactPerson, contactNumber, room,availablefrom,availableto,contact from complaints ";
			$status="and";
			$sql.="where ( 1=1 ";
			$status.=" processed=2";
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
		$sql="Select id,name,designation,department,location,description,processed,area,time,dispatchedTime,finishedTime, contactPerson, contactNumber, room,timing,availablefrom,availableto,contact from complaints where processed=0";
//limit ".($page*$itemsperpage).",$itemsperpage
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
	return document.getElementById("descdiv").innerHTML=str;

}


function rowover(id,str,timing,contact)
{
	id.style.background='#9ec630'; id.style.cursor='pointer';
	document.getElementById("optiondiv").style.display='none'
	document.getElementById("descdiv").innerHTML="<h2>Description : </h2>" + myDesc(document.getElementById("desc"+str).value)
	document.getElementById("descdiv").innerHTML+="<h4>Availablity Time : </h4>" + myTime(timing)
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
</script>

<?php require_once('header.php') ?>
<div id="menu" >
  <ul id="nav1">
  <?php 
  echo '<a href="completed.php"><center><font color=green>Completed</font></center></a><a href="dispatched.php"><center>Dispatched</center></a><a href="unprocessed.php"><center>Unprocessed</center></a>';  
    echo '';
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
	<table align="center" width="80%" id="table1">
<tr>
<th>Compl.No</th>
<th>Name</th>
<th>Desig</th>
<th>Loca</th>
<th>Room/Quarter No</th>
<th>Status</th>
<th>Time</th>
<th>Dispatch Time</th>
<th>Complete Time</th>
<th>Contact Person</th>
<th>Contact Number</th>
</tr>
<?php
	$i = 0;
		if(!isset($ids))
			$ids = 0;		
	while($row=mysql_fetch_array($result))
	{			

?>
<tr <?php if($i%2) { ?> style="background:#CCCCCC" <?php } else { ?> <?php }?> onmouseover="rowover(this,'<?php echo $i ?>','<?php echo $row['time']?>','<?php echo $row['contact']?>')" onmouseout="rowout(this,'<?php if($i%2) echo '#CCCCCC'; else echo '#e6e6e6'; ?>','<?php echo $row['id'] ?>')" <?php if($row['processed']!='2') {?>onclick="rowclick(this,'<?php echo $row['id']?>')"<?php } ?>>
<td align="center"><?php echo "EL".str_pad($row['id'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php echo $row['name'] ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<input type = "hidden" id = "toPrint<?php echo $row['id'];?>" value="<?php echo $row['processed']; ?>">

 
<td align="center"><?php
$src = "images/processed.png";
		if ($row['processed']=='1')
		echo "<image src='dispatched.jpeg' ></img>";
		else if($row['processed']=='2')
		echo "<img src='$src'height='15' width='15' border='0'alt='' alt='' />";
		else
		echo "<image src='unprocessed.jpeg'></img>";
 ?></td>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php //changes here ?><?php if(strlen($row['dispatchedTime']) != 0) echo $row['dispatchedTime']; ?></td>
<td align="center"><?php //changes here ?><?php if(strlen($row['finishedTime']) != 0) echo $row['finishedTime']; ?></td>
<td align="center"><?php echo $row['contactPerson'] ?></td>
<td align="center"><?php echo $row['contactNumber'] ?></td>
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
</table><br />
<?php if($i == 0)
echo "<center>No record(s) found.</center>";?>
<input type="hidden" name="ids" value="<?php echo $ids; ?>" />
</div>
</div>

<div  class="box" id="left">

<div class="box" id="optiondiv" style="position:fixed; right:5px; max-width:200px; bottom:-2px;">	
			
	</div>
<div class="box" id="descdiv" style="display:none; position:fixed;right:20px;min-width:180px;"></div>

</div>
<?php require_once('footer.php') ?>
</div>

</form>

<form name="formSearch" method="post">
<input style="position:absolute;top:150px;right:105px;" type="input" id = "searchText" name="process3" />
<input style="position:absolute;top:150px;right:20px;" type="submit" id = "searchBtn" name="nm" value="search" />
</form>
</body>
</html>
