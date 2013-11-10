<?php   require_once('functions.php');
		require_once("header.php");
		require_once('conn.php'); 
		$result="";
		if(isset($_POST['Submit']))
		{
			$sql="Insert into feedback(user,feed) values('".$_SESSION['user']."',";
			$sql.="'".$_POST['feed']."'" ;
			$sql.=")";
			if(mysql_query($sql,$conn)) $result="Thanks for feedback";
			else $result=die(mysql_error());
		}	

?>
<script>
function validate()
{
	if(document.feed_form.feed.value=="")
	{	error("Please write feedback.")
		document.feed_form.feed.focus()
		return false;
	}
	return true;
}
function error(str)
{
	document.getElementById("result").innerHTML=str
}
function writeToText(str)
{
	document.feed_form.feed.value = str;
}
</script><title>feedback form</title>
<center>
<div>
<form name="feed_form" method="post" onsubmit="return validate()">
<table>
<tr><td id="result"><?php echo $result; ?><td></tr>
<tr>
<td>
<center><h2>Feedback form</h2></td>
</tr>
<tr><td><input type="radio" name="Value1" onclick="writeToText('Service is Very Good')"/>&nbsp;Service is Very Good</td></tr>
<tr><td><input type="radio" name="Value1" onclick="writeToText('Service is Good')"/>&nbsp;Service is Good</td></tr>
<tr><td><input type="radio" name="Value1" onclick="writeToText('Service is Fair')"/>&nbsp;Service is Fair</td></tr>
<tr><td><input type="radio" name="Value1" onclick="writeToText('Service is Poor')"/>&nbsp;Service is Poor</td></tr>
<tr><td><input type="radio" name="Value1" onclick="writeToText('Service is Very Poor')"/>&nbsp;Service is Very Poor</td></tr>
<tr><td><textarea cols="60" rows="10" name="feed" ></textarea></td></tr>
</table>
<tr><td><input type="submit" name="Submit" value="Submit my feedback"</td></tr>
</form>
</div>
</center>
<?php require_once("footer.php");?>
</body>
</html>
