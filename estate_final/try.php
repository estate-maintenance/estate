<?php
session_start();
require_once('header.php');
require_once('conn.php');
$sql="SELECT * FROM complaints WHERE username='$_SESSION[user]'";
$result=mysql_query($sql,$conn);
$num=mysql_num_rows($result);

if($num > 0)
{
	echo 'Username: <b>' . $_SESSION['user'] . '</b><h1 style="margin: -10px 0 0 0;"><center>My Complaints.</center></h1><span style="float:right; margin:-40px 10px 0 0;">Total complaint(s) made: <b>' . $num . '</b></span><hr />';
?>
<div id="content">

<div id="right">

<table align="center" width="80%" id="table1">
<tr style="background-color: Orange;">
<th>Time</th>
<th>ID</th>
<th>Name</th>
<th>Designation</th>
<!--<th>Department</th>-->
<th>Location</th>
<th>Room/Quarter No</th>
<th>Status</th>
<!--<th>Contact Person</th>
<th>Contact Number</th>-->
</tr>
<?php
$i = 0;
	while($row=mysql_fetch_array($result))
	{
?>
<tr <?php if(++$i%2) { ?> style="background:#CCCCCC" <?php } else { ?> <?php }?> onmouseover="rowover(this,'<?php echo $i ?>','<?php echo $row['time']?>','<?php echo $row['contact']?>')" onmouseout="rowout(this,'<?php if($i%2) echo '#CCCCCC'; else echo '#e6e6e6'; ?>','<?php echo $row['id'] ?>')" <?php if($row['processed']=='0') {?>onclick="rowclick(this,'<?php echo $row['id']?>')"<?php } ?>>
<td align="center"><?php echo $row['time'] ?></td>
<td align="center"><?php echo "EL".str_pad($row['id'],6,"0",STR_PAD_LEFT) ?></td>
<td align="center"><?php echo $row['username'] ?></td>
<td align="center"><?php echo $row['designation'] ?></td>
<!--<td align="center"><?//php echo $row['department'] ?></td>-->
<td align="center"><?php echo $row['location'] ?></td>
<td align="center"><?php echo $row['room'] ?></td>
<td align="center"><?php
		if ($row['processed']=='1')
		echo "<font color=blue>Dispatched</font>";
		else if($row['processed']=='2')
		echo "<font color=green>Finished</font>";
		else
		echo "<font color=red>Unprocessed</font>";
 ?></td>
<!--<td align="center"><?php echo $row['contactPerson'] ?></td>
<td align="center"><?php echo $row['contactNumber'] ?></td>-->
<?php
}
?>
</tr>
</table><br />
<?php
}
else
echo "<b><center>You haven't made any complaints yet!</center></b>";
mysql_close($conn);
?>
</div>
</div>
<?php
require_once('footer.php');
?>
