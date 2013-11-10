<?php
require_once('functions.php');
secure(4);
require_once('conn.php');
include('inject.php');
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
			$flag = 0;
			$_POST['complaintNo']=clean($_POST['complaintNo']);
			$sql="Insert into materials (complaintNo, items, count, indentOpen_date) values ('";
			$sql.=$_POST['complaintNo']."' , ";	
			$sql.="'".str_replace(" ", "-", $_POST['addedItem'])."'";				
			$sql.= ", " . $_POST['cntItems']. ", " . "NOW()";
			$sql.=")";
			for($i=1;$i<=$_POST['cntItems'];$i++)			
			{
				$sql1="SELECT id, item, quantity FROM INVENTORY WHERE item LIKE '" . $_POST["finalItem".$i] . "%'";				
				$result=mysql_query($sql1,$conn);
				while($row=mysql_fetch_array($result))
				{
					if($row['quantity']<$_POST['finalCnt'.$i])
					{
						$flag = 1;
						echo "Requested unit(s) of <b>" . $_POST['finalItem'.$i] . " (" . $_POST['finalCnt'.$i] . ") </b> more than available inventory <b>(" . $row['quantity']. ")</b>.<br />";						
						break;
					}
				}
			}
			if($flag == 1)
			{
				echo "<br />Please go back.";
				exit();
			}
			else if(mysql_query($sql,$conn))
			{
				$id=mysql_insert_id($conn);
				$ref="IN".str_pad($id,6,"0",STR_PAD_LEFT);
				for($i=1;$i<=$_POST['cntItems'];$i++)							
				{
					$sql = "UPDATE inventory SET quantity = quantity - " . $_POST['finalCnt'.$i] . " where item LIKE '" . str_replace(" ", "-", $_POST['finalItem'.$i]). "%'" ;
					mysql_query($sql,$conn);
				}								
					$text="Request Registered Successfully!";
					$text.="<br>Indent Number for this Complaint is : ".$ref;
			}
			else
				$text="Error registering request.";
		}	
?>
<?php require_once('header.php') ?>
<script>       
function addItem()
{     
	var f=document.materialForm  
	cnt = parseInt(document.getElementById('cntItems').value);
	index = document.getElementById('selItem').selectedIndex;
	items = parseInt(document.getElementById('noItems').value);
	var num = /^\d+$/;
	if(index >= 1)
	{
		if( (items < 1) || (items.value=="") || (!num.test(items)) )
		{
		//alert("Enter no. of items. ");
		f.noItems.focus()
		x = 0;
		blinkBorder("white","red", f.noItems, 500);
		}
			
		else
		{
			cnt = cnt + 1;
			if(cnt == 1)
			{
				document.getElementById('addItemDiv').innerHTML = "Selected Items are:" + "<br />";
				document.getElementById('finalABCDEF').value = 1;
			}
			document.getElementById('cntItems').value = cnt;	
			document.getElementById('addItemDiv').innerHTML += cnt + ". " + "<input type = 'text' readonly value = '" + (document.getElementById("selItem").options[(document.getElementById('selItem').selectedIndex)].value) + "' size = '70' /><input type = 'text' size = '5' value = '" + items + "' readonly/>" + "<br />";
			document.getElementById('addItemDiv').innerHTML += "<input type = 'hidden' value = '" + (document.getElementById("selItem").options[(document.getElementById('selItem').selectedIndex)].value) + "' name = 'finalItem" + cnt + "' size = '70' /><input type = 'hidden' size = '5' + name = 'finalCnt" + cnt + "' value = '" + items + "' />" + "<br />";
			document.getElementById('addedItem').value += document.getElementById("selItem").options[(document.getElementById('selItem').selectedIndex)].value + "$" + items + "$";
		}
	}	  
}


function show()
{	
	i=1
	while(document.getElementById(i))
	document.getElementById(i++).style.display='none'
	if(document.materialForm.comlocation.value)
	document.getElementById(document.materialForm.comlocation.value).style.display='block'
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
	var f=document.materialForm
	var nameReg = /^[a-zA-Z ]*$/;
	var numReg = /^[a-zA-Z ]*$ || ^\d+$/;
	var num = /^\d+$/;
	if(f.complaintNo.value=="" || !numReg.test(f.complaintNo.value) || f.complaintNo.value.length < 8 || f.complaintNo.value.length > 8)
	{	alert("Please Enter Proper Complaint Number.\nComplaint Number can have only Aplhabets & Numbers (8 digits)");
		f.complaintNo.focus()
		x = 0;
		blinkBorder("white","red", f.complaintNo, 500);
		return false;
	}


if(document.getElementById('finalABCDEF').value == 0)
{

alert("Please Select one or more items.")
f.selItem.focus()
		x = 0;
blinkBorder("white","red", f.selItem, 500);

		return false;
}


 if(f.selItem.value=="0")
	{	alert("Please Select Item.")
		f.selItem.focus()
		x = 0;
		blinkBorder("white","red", f.selItem, 500);
		return false;
	}

 
  if( (f.noItems.value=="") || (f.noItems.value < 1) ||  (!num.test(f.noItems.value)) )
	{	alert("Please Enter Item Quantity.")
		f.noItems.focus()
		x = 0;
		blinkBorder("white","red", f.noItems, 500);
		return false;
	}
  
}




function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}


</script>

<form name="materialForm" method="post" onsubmit="return validate1()">

<div id="content">
<div id="right">

<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>


<table border="0" cellpadding="5" cellspacing="5">
<tr>
<td width = "200px;">Complaint No.: </td>                                          
<input type="hidden" name="cntItems" style="display:none;" id="cntItems" value="0">
<input type="hidden" name="finalABCDEF" style="display:none;" id="finalABCDEF" value="0">
<td><input type="text" name="complaintNo" size="12" /></td>
</tr>
<tr>
<td>
</td>
<td><input type="hidden" name = "addedItem" id="addedItem" >
<!--</form>-->
</td>
</tr>
<tr>
<td>Select Item</td>
<td style='text-align: center;'>
<select id = "selItem"name="selItem">
<option name="opt0"value="0">Select</option>
<?php
$i=1;
	$result=mysql_query("Select distinct item from inventory order by item",$conn);
	while($row=mysql_fetch_array($result))
	{	if ($row[0]!="") {
?>
<option name="opt".$i value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
$i++;
<?php
	}}
?>
<!--<option name="opt1"value = "FR PVC insulated 0.5 Sq mm Copper Wire Multistrand 1.1KV Grade">FR PVC insulated 0.5 Sq mm Copper Wire Multistrand 1.1KV Grade 	
</option>
<option name="opt2"value = "FR PVC insulated 0.5 Sq mm Copper Wire Single 1.1KV Grade">FR PVC insulated 0.5 Sq mm Copper Wire Single 1.1KV Grade	
</option>
<option name="opt3"value = "FR PVC insulated 1.0 Sq mm Copper Wire Multistrand Coil 1.1KV Grade">FR PVC insulated 1.0 Sq mm Copper Wire Multistrand Coil 1.1KV Grade	
</option>
<option name="opt4"value = "FR PVC insulated 1.5 Sq mm Copper Wire Multistarnd Coil 1.1KV Grade">FR PVC insulated 1.5 Sq mm Copper Wire Multistarnd Coil 1.1KV Grade	
</option>
<option name="opt5"value = "Aluminium 7/2 Coil 1.1KV Grade">Aluminium 7/2 Coil 1.1KV Grade 	
</option>
<option name="opt6"value = "FR PVC insulated 2.5 Sq mm multistrand Copper Wire Coil 1.1KV Grade">FR PVC insulated 2.5 Sq mm multistrand Copper Wire Coil 1.1KV Grade	
</option>
<option name="opt7"value="FR PVC insulated 4.0 Sq mm Copper Wire Coil 1.1KV">FR PVC insulated 4.0 Sq mm Copper Wire Coil 1.1KV	
</option>
<option name="opt8"value="FR PVC insulated 6.0 Sq mm Copper Wire Coil 1.1KV">FR PVC insulated 6.0 Sq mm Copper Wire Coil 1.1KV	
</option>
<option name="opt9"value="FR PVC insulated 10.0 Sq mm Copper Wire Coil 1.1KV">FR PVC insulated 10.0 Sq mm Copper Wire Coil 1.1KV	
</option>
 <optgroup label="Legrand mcb & MCCB	">
<option name="opt10"value="4 Pole 63 Amps C Curve"> 4 Pole 63 Amps C Curve	
</option>
<option name="opt11"value="4 Pole 100 Amps C Curve"> 4 Pole 100 Amps C Curve	
</option>
<option name="opt12"value="4 Pole 125 Amps C Curve"> 4 Pole 125 Amps C Curve	
</option>
<option name="opt13"value="20 Amps SP C curve"> 20 Amps SP C curve	
</option>
<option name="opt14"value="32 Amps SP C curve"> 32 Amps SP C curve	
</option>
</optgroup>
<optgroup label = "Switch & Sockets">
</option>
<option name="opt15"value="5/6 Amps Switch Lisha Dishno(Brown & White)">5/6 Amps Switch Lisha Dishno(Brown & White)	
</option>
<option name="opt16"value="5/6 Amps Lisha Socket (Brown & White)">5/6 Amps Lisha Socket (Brown & White)	
</option>
<option name="opt17"value="16/20 Amps Lisha Switch(Brown & White)">16/20 Amps Lisha Switch(Brown & White)	
</option>
<option name="opt18"value="16/ 20 Amps Lisha Socket (Brown & White)">16/ 20 Amps Lisha Socket (Brown & White)	
</option>
<option name="opt19"value="5/6 Amps Switch Anchor Delux Ivory">5/6 Amps Switch Anchor Delux Ivory	
</option>
<option name="opt20"value="5/6 Amps Anchor Switch Cherry">5/6 Amps Anchor Switch Cherry	
</option>
<option name="opt21"value="Socket Type Step Regulator">Socket Type Step Regulator	
</option>
<option name="opt22"value="Lisha 5 in One (16/6A )">Lisha 5 in One (16/6A )	
</option>
</optgroup>
<optgroup label = "MK Modular">
<option name="opt23"value="2 Module Plate">2 Module Plate	
</option>
<option name="opt24"value="3 Module Plate">3 Module Plate	
</option>
<option name="opt25"value="4 Module Plate">4 Module Plate	
</option>
<option name="opt26"value="6 Module Plate">6 Module Plate	
</option>
<option name="opt27"value="8 Module Plate">8 Module Plate	
</option>
</optgroup>
<optgroup label = "Crab Tree">
<option name="opt28"value="Modular Swiches & Sockets">Modular Swiches & Sockets	
</option>
<option name="opt29"value="6 A Switch">6 A Switch	
</option>
<option name="opt30"value="16 A Switch">16 A Switch	
</option>
<option name="opt31"value="6 A 2 in One Socket">6 A 2 in One Socket	
</option>
<option name="opt32"value="16 A 2 in One Socket">16 A 2 in One Socket	
</option>
<option name="opt33"value="2 Module Plate">2 Module Plate	
</option>
<option name="opt34"value="4 Module Plate">4 Module Plate	
</option>
<option name="opt35"value="8 Module Plate">8 Module Plate	
</option>
</optgroup>
<optgroup label = "Capacitor">
<option name="opt36"value="2 MFD 440 V Keltron">2 MFD 440 V Keltron	
</option>
<option name="opt37"value="2.5MFD 440 V Keltron">2.5MFD 440 V Keltron	
</option>
<option name="opt38"value="12.5MFD 440 V Keltron">12.5MFD 440 V Keltron	
</option>
<option name="opt39"value="20 MFD 440 V Keltron"> 20 MFD 440 V Keltron 	
</option>
<option name="opt40"value="33 MFD 440 V Keltron"> 33 MFD 440 V Keltron 	
</option>
</optgroup>
<optgroup label = "Lamp">
<option name="opt41"value="Pls 865/2P 9 W Philips">Pls 865/2P 9 W Philips	
</option>
<option name="opt42"value="Pls 865/2P 11 W Philips">Pls 865/2P 11 W Philips	
</option>
<option name="opt43"value="Pl-C 865/2P 13 W Philips">Pl-C 865/2P 13 W Philips	
</option>
<option name="opt44"value="Pl-C 865/2P 18W Philips">Pl-C 865/2P 18W Philips	
</option>
<option name="opt45"value="Pl-C 865/4P 18W Philips">Pl-C 865/4P 18W Philips	
</option>
<option name="opt46"value="4 pin 36 Watts 2'">4 pin 36 Watts 2'	
</option>
<option name="opt47"value="14 W CFL Philips">14 W CFL Philips	
</option>
<option name="opt48"value="18 W CFL Philips"> 18 W CFL Philips	
</option>
<option name="opt49"value="T5 -14 W 2ft Philips">T5 -14 W 2ft Philips	
</option>
<option name="opt50"value="18 W 2 Ft Tube Philips">18 W 2 Ft Tube Philips	
</option>
<option name="opt51"value="T5 - 28W Philips">T5 - 28W Philips	
</option>
<option name="opt52"value="36 Watts Philips"> 36 Watts Philips	
</option>
<option name="opt53"value="Philips 40 watts">Philips 40 watts	
</option>
<option name="opt54"value="70 W SON I Philips">70 W SON I Philips	
</option>
<option name="opt55"value="70 W Sodium Tube Philips">70 W Sodium Tube Philips	
</option>
<option name="opt56"value="70 W MH Tube CDMT Philips">70 W MH Tube CDMT Philips	
</option>
<option name="opt57"value="150 W SON Philips">150 W SON Philips	
</option>
<option name="opt58"value="250 W SON Philips">250 W SON Philips	
</option>
<option name="opt59"value="150W MH Tube CDMT Philips">150W MH Tube CDMT Philips	
</option>
<option name="opt60"value="250 W MH CDMT Philips">250 W MH CDMT Philips 	
</option>
<option name="opt61"value="250 W MH CDMT Crompton">250 W MH CDMT Crompton	
</option>
<option name="opt62"value="400 W MH CDMT Philips">400 W MH CDMT Philips	
</option>
<option name="opt63"value="400 W MH CDMT Crompton">400 W MH CDMT Crompton	
</option>
</optgroup>
<optgroup label = "Choke">
<option name="opt64"value="70 W SON / MH Philips">70 W SON / MH Philips	
</option>
<option name="opt65"value="70 W SON / MH Crompton">70 W SON / MH Crompton	
</option>
<option name="opt66"value="70 W SON / MH Crompton">70 W SON / MH Crompton	
</option>
<option name="opt67"value="250 W Metal Halide crompton">250 W Metal Halide crompton	
</option>
<option name="opt68"value="400 W Metal Halide Philips">400 W Metal Halide Philips	
</option>
<option name="opt69"value="400 W Metal Halide Cropmton">400 W Metal Halide Cropmton	
</option>
<option name="opt70"value="PL-C 18 W Choke">PL-C 18 W Choke	
</option>
<option name="opt71"value="PL-C 18 W E Choke">PL-C 18 W E Choke</option>	
<option name="opt72"value="PL-S 11 W Choke">PL-S 11 W Choke</option>
</optgroup>
<optgroup label = "Igniter">
<option name="opt73"value="SN 51"> SN 51</option>
<option name="opt74"value="SN 57"> SN 57</option>
<option name="opt75"value="SN 58">SN 58</option>
</optgroup>
<optgroup label = "Hyalam Box Height 2">
<option name="opt76"value="4\"X4\"">4"X4"	
</option>
<option name="opt77"value="6\"X4\"	>6"X4"	</option>
<option name="opt78"value="8\"X4\"	>8"X4"	</option>
</optgroup>
<optgroup label = "Sleeves">
<option name="opt79"value="PVC 8mm">PVC 8mm 	
</option>
<option name="opt80"value="PVC 10mm">PVC 10mm 	
</option> 
<option name="opt81"value="Fibre 5 mm"> Fibre 5 mm 	
</option>
<option name="opt82"value="Fibre 8 mm"> Fibre 8 mm 	
</option>
<option name="opt83"value="Fibre 10 mm"> Fibre 10 mm 	
</option>
</optgroup>
<optgroup label = "Holder">
<option name="opt84"value="Pendent">Pendent	
</option>
<option name="opt85"value="Pattern">Pattern	
</option>
<option name="opt86"value="Angle">Angle	
</option>
</optgroup>
<optgroup label = "Fuses">
<option name="opt87"value="100 Amps Rewireable Fuse Unit">100 Amps Rewireable Fuse Unit</option>
<option name="opt88"value="100 Amps Rewireable Fuse Unit">100 Amps Rewireable Fuse Unit	
</option>
</optgroup>
<optgroup label = "Miscellaneous">
<option name="opt89"value="32 A , 240 V Bosma / Gem Main switch">32 A , 240 V Bosma / Gem Main switch	
</option>
<option name="opt90"value="3/4 PVC Spring Hose">3/4 PVC Spring Hose 	
</option>
<option name="opt91"value="PVC Spring Hose">1 "PVC Spring Hose 	
</option>
<option name="opt92"value="20 W starter,110 V">20 W starter,110 V	
</option>
<option name="opt93"value="5 Amps 3 Pin top">5 Amps 3 Pin top	
</option>
<option name="opt94"value="15 Amps 3 Pin top">15 Amps 3 Pin top	
</option>
<option name="opt95"value="PVC Insulation Tape">PVC Insulation Tape	
</option>
</optgroup>
</select>
-->
</td>
<td><input type = "text" name="noItems" id="noItems" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" onclick = "addItem();" value  = "Select"></td>
</tr>
<td width="36%" align="left" colspan="2">
</div>
</table>
<div style="margin-left:10px;" id = "addItemDiv">     
</div>
<!--<center><input align="center" type="submit" name="Submit"  onclick = "validate();"value="Submit" /></center>-->
</center><input type="submit" name="Submit" value="Submit" /></center>
</div>

</form>
<?php require_once('footer.php') ?>
</body>
</html>
