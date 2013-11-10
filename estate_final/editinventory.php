<?php
require_once('functions.php');
secure(4);
require_once('conn.php');
?>
<?php
		if(isset($_POST['Submit']))
		{
			$sql="Insert into inventory(item,quantity) values('".$_POST['itemname']."',";
			$sql.=$_POST['quantity'].",";
			$sql.=")";
			mysql_query($sql,$conn);
			$text="Item Added Successfully!";
		}

?><?php require_once('header.php') ?>
<script>
function validate()
{
	var f=document.form1
	if(f.itemname.value=="")
	{	error("Please Enter Item Name.")
		f.itemname.focus()
		return false;
	}
	if(f.quantity.value=="")
	{	error("Please Enter Quantity.")
		f.quantity.focus()
		return false;
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

<div align="center" class="box" style="color:#006600"><?php echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>

<table width="60%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td colspan="2"><select name="items">
				<?php
					$result=mysql_query("Select id,item,quantity from inventory",$conn);
					while($row=mysql_fetch_array($result))
					{
				?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['item'] ?></option>
                <?php } ?>
				</select>
</td>
</tr>
<tr align="center">
<td width="39%" align="right">Enter Item Name : </td>
<td width="25%" align="left"><input type="text" name="itemname" size="26" value="<?php echo $row['item'] ?>" /></td>
</tr>
<tr align="center">
<td width="39%" align="right">Enter Quantity of Item In Stock : </td>
<td width="25%" align="left"><input type="text" name="quantity" size="26" value="<?php echo $row['quantity'] ?>" /></td>
</tr>
<tr align="center">
</tr>
<tr align="center">
<td>&nbsp;</td>
<td  align="left"><input type="submit" name="Submit" value="Update Item" /></td>
</tr>
</table>
</div>

<div id="left">
	<div class="box">
			This is a section for updates/ news.
	</div>


</div>

</div>
</form>
<?php require_once('footer.php') ?>
</body>
</html>
