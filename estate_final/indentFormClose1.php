<?php
require_once('functions.php');
secure(4);
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
		$sql="Select Count(*) from materials";
		$result=mysql_query($sql,$conn);
		if($result and mysql_num_rows($result)>0)
		{
			$row=mysql_fetch_array($result);
			$totalpages=$row[0]/10;
		}
		else
		$totalpages=1;
if(isset($_POST['close']))
{
	$arr=explode(",",$_POST['ids']);
	for($i=0;$i<(count($arr)-1);$i++)
	{
		if(isset($_POST[$arr[$i]]))
		{
		if(isset($_POST['usedFan']))
			{
				$sql = "UPDATE inventory SET quantity = (quantity - " . $_POST['usedFan'] . ") where item LIKE 'Fan%'";
				mysql_query($sql,$conn);
				$sql = "UPDATE materials SET fan_used = (" . $_POST['usedFan'] . ") where indentNo=".$arr[$i];
				mysql_query($sql,$conn);
				
			}
			if(isset($_POST['usedTube']))
			{
				$sql = "UPDATE inventory SET quantity = (quantity - " . $_POST['usedTube'] . ") where item LIKE 'Tube%'";
				mysql_query($sql,$conn);
				$sql = "UPDATE materials SET tubelight_used = (" . $_POST['usedTube'] . ") where indentNo=".$arr[$i];
				mysql_query($sql,$conn);
				
			}
			if(isset($_POST['usedSwitch']))
			{
				$sql = "UPDATE inventory SET quantity = (quantity - " . $_POST['usedSwitch'] . ") where item LIKE 'Switch%'";
				mysql_query($sql,$conn);
				$sql = "UPDATE materials SET switch_used = (" . $_POST['usedSwitch'] . ") where indentNo=".$arr[$i];
				mysql_query($sql,$conn);
				
			}
			if(isset($_POST['usedPlug']))
			{
				$sql = "UPDATE inventory SET quantity = (quantity - " . $_POST['usedPlug'] . ") where item LIKE 'Plug%'";
				mysql_query($sql,$conn);
				$sql = "UPDATE materials SET plugPoint_used = (" . $_POST['usedPlug'] . ") where indentNo=".$arr[$i];
				mysql_query($sql,$conn);
				
			}
			if(isset($_POST['usedRegulator']))
			{
				$sql = "UPDATE inventory SET quantity = (quantity - " . $_POST['usedRegulator'] . ") where item LIKE 'Regulator%'";
				mysql_query($sql,$conn);
				$sql = "UPDATE materials SET regulator_used = (" . $_POST['usedRegulator'] . ") where indentNo=".$arr[$i];
				mysql_query($sql,$conn);
				
			}
			//echo "Successfully recorded.";
			
		mysql_query("Update materials set status=2 where status<2 and indentNo=".$arr[$i]);
		}
	}
}
		$sql="Select  * from materials where status=2";
		$result=mysql_query($sql,$conn);
		
		/*		if(isset($_POST['Submit']))
		{
			if(isset($_POST['process1']))
				$sql="Select indentNo, complaintNo, fan, tubelight, switch, plugPoint, regulator, status from materials where status=1";
			if(isset($_POST['process2']))
			{	
			    $sql="Select indentNo, complaintNo, fan, tubelight, switch, plugPoint, regulator, status from materials where status=2";
			}
			if(isset($_POST['process1'])&&isset($_POST['process2']))
			{	
			$sql="Select indentNo, complaintNo, fan, tubelight, switch, plugPoint, regulator, status from materials";
			}
		}
		else
		$sql="Select indentNo, complaintNo, fan, tubelight, switch, plugPoint, regulator, status from materials order by indentNo ASC";
		$result=mysql_query($sql,$conn);
		*/
?>
		
	
		

<script>
function rowclick(rowid,cid)
{	
	var f=document.getElementById("ID"+cid)	
	if(f.checked)
	{
		f.checked=false
		rowid.style.background='#ffbbcc'		
	}
	else
	{	
		document.getElementById('closeIndent').innerHTML = "";
		f.checked=true
		rowid.style.background='#fff6bf'
		var finalID = document.getElementById('closeID' + cid).value;
		var complaintID = document.getElementById('getComplaint' + cid);
		complaintID = (complaintID.value).replace("closeComplaint", "");
		var fan = document.getElementById('closeFan' + cid).value;
		var tube = document.getElementById('closeTube' + cid).value;
		var Switch = document.getElementById('closeSwitch' + cid).value;
		var plug = document.getElementById('closePlug' + cid).value;
		var regulator = document.getElementById('closeRegulator' + cid).value;
		document.getElementById('closeIndent').innerHTML+= "<table><tr><td>Complaint No.</td><td><input type = 'text' disabled name = 'finalCloseID' id = 'finalCloseID' value = '" + complaintID  + "' /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td><br /></td><td><br /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td>Fans taken: </td><td><input type = 'text' disabled name = 'existingFan' id = 'existingFan' value = '" + fan + "' /></td></tr>";
		if(fan != 0)
			document.getElementById('closeIndent').innerHTML+= "<tr><td>Fans used: </td><td><input type = 'text' name = 'usedFan' id = 'usedFan' /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td><br /></td><td><br /></td></tr>";			
		document.getElementById('closeIndent').innerHTML+= "<tr><td>Tubes taken: </td><td><input type = 'text' disabled name = 'existingTube' id = 'existingTube' value = '" + tube + "' /></td></tr>";
		if(tube != 0)
			document.getElementById('closeIndent').innerHTML+= "<tr><td>Tubes used: </td><td><input type = 'text' name = 'usedTube' id = 'usedTube' /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td><br /></td><td><br /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td>Switches taken: </td><td><input type = 'text' disabled name = 'existingSwitch' id = 'existingSwitch' value = '" + Switch + "' /></td></tr>";
		if(Switch != 0)
			document.getElementById('closeIndent').innerHTML+= "<tr><td>Switches used: </td><td><input type = 'text' name = 'usedSwitch' id = 'usedSwitch' /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td><br /></td><td><br /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td>Plugs taken: </td><td><input type = 'text' disabled name = 'existingPlug' id = 'existingPlug' value = '" + plug + "' /></td></tr>";
		if(plug != 0)
			document.getElementById('closeIndent').innerHTML+= "<tr><td>Plugs used: </td><td><input type = 'text' name = 'usedPlug' id = 'usedPlug' /></td></tr>";		
		document.getElementById('closeIndent').innerHTML+= "<tr><td><br /></td><td><br /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "<tr><td>Regulators taken: </td><td><input type = 'text' disabled name = 'existingRegulator' id = 'existingRegulator' value = '" + regulator + "' /></td></tr>";
		if(regulator != 0)
			document.getElementById('closeIndent').innerHTML+= "<tr><td>Regulators used: </td><td><input type = 'text' name = 'usedRegulator' id = 'usedRegulator' /></td></tr>";
		document.getElementById('closeIndent').innerHTML+= "</table>"
		document.getElementById('closeIndent').hidden = false;
	}	
}
</script><?php require_once('header.php') ?>

<div id="menu" >
  <ul id="nav1">
  <?php 
   	echo '<li><a href="indentFormOpen.php">Open Forms</a><a href="indentFormClose.php">Closed Forms</a></li>';  
    echo '';
   ?>
   </ul>
 </div>

<form name="form1" method="post">
<div id="content">
<div id="right1">
<table align="center" width="100%" id="table1">
<tr>
<th>Indent No</th>
<th>Complaint No</th>
<th>Fan Quantity</th>
<th>Tubelight Quantity</th>
<th>Switch Quantity</th>
<th>Plug Point Quantity</th>
<th>Regulator Quantity</th>
<th>Status</th>
<th>Open Date</th>
<th>Closed Date</th>
</tr>
<?php
		while($row=mysql_fetch_array($result))
	{
if (!isset($i))
$i="";
?>
<tr>
<tr <?php if(++$i%2) { ?> style="background:#CCCCCC" <?php } else { ?> style="background:#ffffff" <?php }?> onclick="rowclick(this,'<?php echo $row['indentNo']?>')"<?php  ?>>
<td align="center"><?php echo "IN".str_pad($row['indentNo'],6,"0",STR_PAD_LEFT) ?></td>
<?php
	$str = "closeComplaint" . str_pad($row['complaintNo'],6,"0",STR_PAD_LEFT);
	$str1 = "getComplaint" . $row['indentNo'];
	echo '<input type = "hidden" name = "' . $str . '" id = "' . $str1 . '" value = ' . $str . '>' ?>
<?php $str = "closeID" . $row['indentNo'];
echo '<input type = "hidden" name = "' . $str . '" id = "' . $str . '" value = ' . $str . '>' ?>

<td align="center"><?php 
		if ($row['status']=='1')
		echo "<font color=red>Open</font>";		
		else if($row['status']=='2')
		echo "<font color=green>Closed</font>";		
 ?></td>
 <td align="center"><?php echo $row['indentOpen_date'] ?></td>
<?php $str = "closeOpenDate" . $row['indentNo'];
echo '<input type = "hidden" name = "' . $str . '" id = "' . $str . '" value = ' . $row["indentOpen_date"] . '>' ?>

 <td align="center"><?php echo $row['indentClose_date'] ?></td>
<?php $str = "closeOpenDate" . $row['indentNo'];
echo '<input type = "hidden" name = "' . $str . '" id = "' . $str . '" value = ' . $row["indentClose_date"] . '>' ?>

 <input type="checkbox" name="<?php echo $row['indentNo'] ?>" id="ID<?php echo $row['indentNo']?>" style="display:none"/>
<?php
if (!isset($ids))
$ids="";
else
$ids.=$row['indentNo'].",";
}
?>
</table><br />

<!--<div align ="right">
<div id = "closeIndent" hidden = true align="right" style="position:absolute;top:250px;right:30px;">
Materials Used: 
</div>
<input type="submit" name="close" value="Close" disabled=true style="position:absolute;top:500px;right:100px;"/>
<input type="hidden" name="ids" value="<?php echo $ids ?>" />
</div>
</div>
-->
<?php //require_once('footer.php') ?>
</div>

</form>

</body>
</html>
