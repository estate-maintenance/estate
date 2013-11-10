<?php
require_once('functions.php');
secure(3);
require_once('conn.php');
?>

<?php
		if(isset($_POST['Submit']))
		{
			$arr=explode(",",$_POST['ids']);
			for($i=0;$i<(count($arr)-1);$i++)
			{
				if(isset($_POST[$arr[$i]]))
				{

					$sql="Insert into report(itemid,quantity,complaintid) values(";
					$sql.=$_POST['items'.$arr[$i]].",";
					$sql.=$_POST['quantity'.$arr[$i]].",";
					$sql.=$arr[$i];
					mysql_query($sql,$conn);
					mysql_query("Update complaints set processed=2 where id=".$arr[$i]);
					mysql_query("Update inventory set quantity=quantity-".$_POST['quantity'.$arr[$i]]." where id=".$_POST['items'.$arr[$i]]);
				}
			}
			echo "<script>top.location.href='reports_final.php'</script>";
		}

?>
<script>
function validate()
{	i=1;
	while(document.getElementById("quantity"+i))
	{
		if(document.getElementById("quantity"+i).value==""||isNaN(document.getElementById("quantity"+i).value))
		{
			error("Please Enter Quantity.")
			document.getElementById("quantity"+i).focus()
			return false

		}

	i++
	}
	return true
}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}

</script>
<?php require_once('header.php') ?>
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">

<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>


<?php

if(isset($_POST['process']))
		{
			$arr=explode(",",$_POST['ids']);
			$k=0;
			for($i=0;$i<(count($arr)-1);$i++)
			{
				if(isset($_POST[$arr[$i]]))
				{
					?>

                    <table width="60%" align="center" border="0" cellpadding="5" cellspacing="5">
                    <tr align="center">
                    <th colspan="2" align="center">For Complaint No: <?php echo "EL".str_pad($arr[$i],6,"0",STR_PAD_LEFT) ?></th>
					</tr>
					<tr>
					<!--<th colspan="2" align="center">Indent No: <?php echo "IN".str_pad($arr[$i],6,"0",STR_PAD_LEFT) ?></th>-->
                    </tr>
                    <tr align="center">
						<td width="39%" align="right">Select Item : </td>
						<td width="25%" align="left"><select name="items<?php echo $arr[$i] ?>">
					<?php
					$result=mysql_query("Select id,item,quantity from inventory",$conn);
					while($row=mysql_fetch_array($result))
					{
					?>
                	<option value="<?php echo $row['id'] ?>"><?php echo $row['item'] ?></option>
                	<?php } ?>
					</select></td>
                    </tr>
                    <tr align="center">
						<td width="39%" align="right">Enter Quantity Used : </td>
						<td width="25%" align="left"><input type="text" name="quantity<?php echo $arr[$i] ?>" id="quantity<?php echo ++$k ?>" /></td>
                    </tr>
                    <input type="checkbox" name="<?php echo $arr[$i] ?>" checked="checked" style="display:none"/>
                    </table>
					<?php
				}
			}
		}
?>
<input type="hidden" name="ids" value="<?php echo $_POST['ids']?>" />
</div>

<div id="left">
	<div class="box">
			This is a section for updates/ news.
	</div>


</div>

</div>
<table align="center" width="60%">
<tr align="center">
<td align="center"><input type="submit" name="Submit" value="Finish>>>" /></td>
</tr>
</table>
</form>
<?php //require_once('footer.php') ?>
</body>
</html>
