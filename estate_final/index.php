<head>
<style>

</style>
</head>

<?php
require_once('functions.php');
secure(1);
require_once('conn.php');
if($_SESSION['type']==4)
header("Location: materialsForm.php");
if($_SESSION['type']==2)
header("Location: reports.php");
if($_SESSION['type']==3)
header("Location: reports_final.php");
if($_SESSION['type']==5)
header("Location: add_user.php");
/*if($_SESSION['type']==1 and $_SESSION['complaint']=='electrical')
header("Location: electrical.php");
die("<script>top.location='electrical.php'</script>");
if($_SESSION['type']==1 and $_SESSION['complaint']=='sanitary')
header("Location: sanitary.php");
if($_SESSION['type']==1 and $_SESSION['complaint']=='carpentry')
header("Location: carpentry.php");
if($_SESSION['type']==1 and $_SESSION['complaint']=='building')
header("Location: building.php");
if($_SESSION['type']==1 and $_SESSION['complaint']=='water_supply')
header("Location: water_supply.php");
if($_SESSION['type']==1 and $_SESSION['complaint']=='horticulture')
header("Location: horticulture.php");
if($_SESSION['type']==1 and $_SESSION['complaint']=='general')
header("Location: general.php");
*/
//Part of the previous chANGE where complaint was selected on login page
 require_once('header.php');
?>
<?php require_once('footer.php') ?>


<form id="form1" name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="rightj">
<div align="center">
<div id="c1" style="width:25%;height:200px;float:left;margin-top:20px;">
<a href="electrical.php"><img src="images/electrical.jpg" style="height:80%;width:70%;"/><br/><br/>ELECTRICAL</a>
</div>
<div id="c2" style="width:25%;height:200px;float:left;margin-top:20px;">
<a href="carpentry.php"><img src="images/carpentry.jpg" style="height:80%;width:70%;"/><br/><br/>CARPENTRY</a>
</div>
<div id="c3" style="width:25%;height:200px;float:left;margin-top:20px;">
<a href="building.php"><img src="images/masonry.jpg" style="height:80%;width:70%;"/><br/><br/>BUILDING</a>
</div>
<div id="c4" style="width:25%;height:200px;float:left;margin-top:20px;">
<a href="sanitary.php"><img src="images/drain.jpg" style="height:80%;width:70%;"/><br/><br/>SANITARY</a>
</div>
<div id="c5" style="width:25%;height:200px;float:left;margin-left:130px;margin-top:40px;">
<a href="water_supply.php"><img src="images/water.jpg" style="height:80%;width:70%;"/><br/><br/>WATER SUPPLY</a>
</div>
<div id="c6" style="width:25%;height:200px;float:left;margin-top:40px;">
<a href="horticulture.php"><img src="images/horti.jpg" style="height:80%;width:70%;"/><br/><br/>HORTICULTURE</a>
</div>
<div id="c7" style="width:25%;height:200px;float:left;margin-top:40px;">
<a href="general.php"><img src="images/general.jpg" style="height:80%;width:70%;"/><br/><br/>GENERAL</a>
</div>
</div>
</div>
	
<div id="left">
	<div class="box">
			<marquee>Save Energy Save Nation</marquee>
	</div>
			
	   
</div>

</div>
<input type="hidden" value="" name="location" />
<input type="hidden" value="" name="room" />
<input type="hidden" value="" name="desig" />
</form>

</body>
</html>

