<?php
$timezone = "Asia/Calcutta";
@date_default_timezone_set($timezone);
$time = strftime("%d/%m/%Y %H:%M:%S");	
require_once('functions.php');
secure(4);
require_once('conn.php');
if($_SESSION['type']==1)
header("Location: index.php");
if($_SESSION['type']==2)
header("Location: reports.php");
if($_SESSION['type']==3)
header("Location: reports_final.php");
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
if(isset($_POST['btnClose']))
{
	$arr=explode(",",$_POST['ids']);
	for($i=0;$i<(count($arr)-1);$i++)
	{
		if(isset($_POST[$arr[$i]]))
		{
		$sql="Select items,count from materials where indentNo=".$arr[$i];
		$result=mysql_query($sql,$conn);
		$num=mysql_num_rows($result);
		if($result and $num>0)
		{
			$row=mysql_fetch_array($result);					
			if(mysql_query("Update materials set status=2, indentClose_date='". $time."' where status<2 and indentNo=".$arr[$i]))
			{
				$items="";
				for($j=1;$j<=$row['count'];$j++)	
				{
					$sql = "UPDATE INVENTORY SET quantity = quantity + " . $_POST['returned'.$j] . " WHERE item LIKE '". $_POST['itemName'.$j]. "%'";
					mysql_query($sql);
					$str ="".$_POST['itemName'.$j]. "->".$_POST['returned'.$j]."";
					$items.=$str."<br />";					
					$sql = "INSERT INTO report VALUES ('', '" .  $_POST['itemName'.$j] . "', " . $_POST['returned'.$j] . ", '" .$time ."', '". $_POST['finalCloseID']. "')";					mysql_query($sql);					
				}
			}			
		}		
						$sql = "UPDATE materials SET returned = '" . $items . "' WHERE indentNo = ". $arr[$i];					
				mysql_query($sql);

	}	
	
	}	
}
		$sql="Select indentNo, complaintNo,items, count, status from materials where status=1";
//		if(isset($_POST['nm']))		
//			//if($isSetId != 0)
//			{
//				$sql.=" and (complaintNo=". $_POST['process3'] .")";
//			}

		$result=mysql_query($sql,$conn);
?>
		
	
		
<script>

function latest(val, id)
{
	var value=parseInt(val);
	if(isNaN(value))
	{
		alert("Only numbers allowed.");
		document.getElementById(id).value='';
	}
}

function rowclick(rowid,cid)
{
	document.getElementById("closeTempID").value = cid;
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
		document.getElementById("saveSubmit").style.display="block";
		var finalID = document.getElementById('closeID' + cid).value;
		var complaintID = document.getElementById('getComplaint' + cid);
		complaintID = (complaintID.value).replace("closeComplaint", "");
		var totalItems = parseInt(document.getElementById('closeTotal'+cid).value);
		document.getElementById('closeIndent').innerHTML+= "<br /><br /><table><tr><td>Complaint No.</td><td><input type = 'text'  name = 'finalCloseID' id = 'finalCloseID' readonly value = '" + complaintID  + "' /></td></tr>";
		for(i=1; i <= totalItems; i++)
		{
			itemName = document.getElementById('clName'+i+'-'+cid).value;
			itemValue = document.getElementById('clValue'+i+'-'+cid).value;
			document.getElementById('closeIndent').innerHTML+= "<tr><td><br /></td><td><br /></td></tr>";
			document.getElementById('closeIndent').innerHTML+= "<tr><td>" + itemName + "(s) taken: </td><td><input type = 'hidden' name = 'itemName" + i + "' value = " + itemName + "><input type = 'text'  disabled readonly name = 'existing" +i + "' id = 'existing" + i + "'  value = '" + itemValue + "' /></td></tr>";
			document.getElementById('closeIndent').innerHTML+= "<br /><tr><td>" + itemName + "(s) returned: </td><td><input type = 'text' name = 'returned" +i+"' id = 'returned" + i + "' onblur='latest(this.value, this.id);'  /></td></tr>";
		}				
		document.getElementById('closeIndent').hidden = false;
		}	
}

function checkSubmit()
{	
	var count = 0;
	cid = document.getElementById("closeTempID").value;
	var totalItems = parseInt(document.getElementById('closeTotal'+cid).value);
	
	for(i=1;i<=totalItems;i++)
	{	
		itemName = document.getElementById('clName'+i+'-'+cid).value;
		itemValue = document.getElementById('clValue'+i+'-'+cid).value;
		existingValue = parseInt(document.getElementById('existing'+i).value);
		returnedValue = parseInt(document.getElementById('returned'+i).value);		
//		document.getElementById('returned'+i).disabled= true;
		if(returnedValue > existingValue)
		{
			document.getElementById('submitError').innerHTML = "<p style='color: red;'>Returned items cannot be more than taken items.</p>";
			count++;
			break;			
		}
		else
			document.getElementById('submitError').innerHTML = "";
	}	
			if(count == 0)
			{
					for(i=1;i<=totalItems;i++)
					{
						existingValue = document.getElementById('existing'+i).disabled=false;
					}
				document.getElementById("saveSubmit").style.display="none";
				document.getElementById("closeSubmit").style.display="block";
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
<form name="formSearch" method="post">
<input style="position:absolute;top:150px;right:105px;" type="input" id = "searchText" name="process3" />
<input style="position:absolute;top:170px;right:105px;" type="submit" id = "searchBtn" name="nm" value="search" />
</form>
<form id="form1" name="form1" method="post">
<div id="content">
<div id="ASright">
<table align="left" width="200px;" id="table1">
<tr>
<th>Indent No</th>
<th>Complaint No</th>
<th> </th>
<th align="center">Status</th>
</tr>
<?php

if (isset($_POST['nm']))
{
		$sql="Select indentNo, complaintNo, status from materials where status=1 and indentNo = ".$_POST['process3'];		
	$result=mysql_query($sql,$conn);
}
if (!isset($ids))
$ids="";

	while($row=mysql_fetch_array($result))
	{
if (!isset($i))
$i="";
?>
<tr>
<tr <?php if(++$i%2) { ?> style="background:#CCCCCC" <?php } else { ?> style="background:#ffffff" <?php }?> onclick="rowclick(this,'<?php echo $row['indentNo']?>')"<?php  ?>>
<input type="hidden" name="closeTempID" id="closeTempID">
<td align="center"><?php echo "IN".str_pad($row['indentNo'],6,"0",STR_PAD_LEFT) ?></td>
<?php
	$str = "closeComplaint" . str_pad($row['complaintNo'],6,"0",STR_PAD_LEFT);
	$str1 = "getComplaint" . $row['indentNo'];
	echo '<input type = "hidden" name = "' . $str . '" id = "' . $str1 . '" value = ' . $str . '>' ?>
<?php $str = "closeID" . $row['indentNo'];
echo '<input type = "hidden" name = "' . $str . '" id = "' . $str . '" value = ' . $str . '>' ?>
<td align="center"><?php echo str_pad($row['complaintNo'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php 
$compCount=$row['count'];
$compNo="closeTotal".$row['indentNo'];
$str = explode('$', $row['items']);
echo "<input type = 'hidden' name=".$compNo." id=".$compNo." value=".(int)($compCount)."/>";
$cnt=0;
for($i=0;$i< (2*$row['count']); $i++)
{
	if($i%2==0)
	{
		$cnt++;
		echo "<input type = 'hidden' name='clName".($cnt)."-".$row['indentNo']."' id='clName".($cnt)."-".$row['indentNo']."' value=".$str[$i]."	>";
		echo "<input type = 'hidden' name='clValue".($cnt)."-".$row['indentNo']."' id='clValue".($cnt)."-".$row['indentNo']."' value=".$str[$i+1].">";
	}
	//echo $str[$i] . " -> ". $str[$i+1]."<br />";
	$i++;
}

 ?></td>
<!--<td align="center"><?php echo $row['count'] ?></td>-->
<td align="left"><?php 
		if ($row['status']=='1')
		echo "<font color=red>Open</font>";		
		else if($row['status']=='2')
		echo "<font color=green>Closed</font>";		
 ?></td>
 <input type="checkbox" name="<?php echo $row['indentNo'] ?>" id="ID<?php echo $row['indentNo']?>" style="display:none"/>
<?php
if (!isset($ids))
$ids="";
else
$ids.=$row['indentNo'].",";
}
?>
</table><br />
<div align ="right" >
<div id = "closeIndent" align="right" style="position:absolute;top:250px;right:30px;">
</div>
</div>
</div>
<input type="button" onclick = "checkSubmit();" id="saveSubmit" name="btnSave"  value="Save" style="display:none; margin-left:1050px; margin-top:20px;"/>
<input type="submit" id="closeSubmit" name="btnClose"  value="Close" style="display:none; margin-left:1050px; margin-top:20px; display:none;"/>
<input type="hidden" name="ids" value="<?php echo $ids?>">
<?php //require_once('footer.php') ?>
</form>
<div id = "submitError" style="margin-left:1050px; margin-top:20px; margin-bottom:100px;">
</div>
</body>
</html>
