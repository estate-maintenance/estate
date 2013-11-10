<?php
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
	if(isset($_POST['Submit']))
	{
		$datefrom=explode("/",$_POST['datefrom']);
		$dateto=explode("/",$_POST['dateto']);
		$query=" and (time>='".date("Y-m-d",mktime(0,0,0,$datefrom[0],$datefrom[1],$datefrom[2]))."' and time<='".date("Y-m-d",mktime(0,0,0,$dateto[0],$dateto[1]+1,$dateto[2]))."')";


	}
	$result=mysql_query("Select item,quantity,id from inventory order by item",$conn);
?><?php require_once('header.php') ?>
<link rel="stylesheet" title="CSS StyleSheet" href="style/cwcalendar.css" type="text/css" media="all" />
<script type="text/javascript" src="scripts/calendar.js"></script>
<script>
function validate()
{
	if(document.getElementById("datefrom").value=='')
	{
		error("Please Enter the dates.")
		document.getElementById("datefrom").focus()
		return false
	}

	if(document.getElementById("dateto").value=='')
	{
		error("Please Enter the dates.")
		document.getElementById("dateto").focus()
		return false
	}
	return true
}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}
</script>

<div id="content">

<div id="right">


<table align="center" width="100%" id="table1" cellpadding="5" cellspacing="5" border="1">
<tr>
<th>S.No.</th>
<th>Item Name</th>
<th>No of Complaints</th>
<th>Quantity(Used)</th>
</tr>
<?php

	$i=1;
	$totalcomplaints=0;
	$totalquantity=0;
	while($row=mysql_fetch_array($result))
	{
	if (!isset($query)) $query="";
/*	$sql="SELECT item FROM inventory WHERE id = ".$row['id'].$query;
	$rec=mysql_query($sql,$conn);
       $ans=mysql_fetch_array($result);
*/	
      
	$sql="Select sum(quantity),count(*) from report where itemid LIKE '". $row[0]. "%'";
	//echo $sql."<br />"; 
	$rec=mysql_query($sql,$conn);
	$ans=mysql_fetch_array($rec);
?>

	<tr align="center"<?php if($i%2) { ?> style="background:#CCCCCC" <?php } ?>>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo $row['item'] ?></td>
    <td align="center"><?php if($ans[1]!="") echo $ans[1]; else echo "0";?></td>
    <td align="center"><?php if($ans[0]!="") echo $ans[0]; else echo "0"; ?></td>    
    </tr>

<?php
 $totalcomplaints+=$ans[1];
 $totalquantity+=$ans[0];
} ?>
	<tr align="center" style="background:#FFFFCC">
    <td align="center">&nbsp;</td>
    <td align="center">Total</td>
    <td align="center"><?php echo $totalcomplaints ?></td>
    <td align="center"><?php echo $totalquantity ?></td>
    </tr>

</table>
<br>
<br>
</div>
<form name="form1" method="post" onsubmit="return validate()">
<div id="left">
	<div id="errorbox"></div>
	<div class="box" id="optiondiv">
			<h2>Report Selection</h2>
            <table align="center" id="table1" width="20%">
            <tr><th colspan="2">Date Wise</th></tr>
            <tr>
            <td align="right">From :</td><td><input type="text" name="datefrom" id="datefrom" value="" readonly="readonly" size="14"  onfocus="fPopCalendar('datefrom','datefrom');"/> </td>
            </tr>
            <tr>
            <td align="right">To :</td><td> <input type="text" name="dateto" id="dateto" value="" readonly="readonly" size="14" onfocus="fPopCalendar('dateto','dateto');"/></td>
            </tr>
           <tr>
            <td colspan="2" align="center"><input type="submit" name="Submit" value="Go" /></td>
           </tr>
         </table>
	</div>
	<div class="box" id="descdiv" style="display:none"></div>

</div>
</form>
</div>
<table height="300px">
<tr><td>&nbsp;</td></tr>
</table>
<?php require_once('footer.php')?>
</body>
</html>
