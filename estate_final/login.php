<?php
	if(!isset($text))
	$text="";
	if(!isset($username))
	$username="";
		require_once('functions.php');
		if(isset($_POST['Submit']))
		{
			$username=htmlentities($_POST['username'],ENT_QUOTES);
			$password=htmlentities($_POST['password'],ENT_QUOTES);
			//$complaint=htmlentities($_POST['complaint'],ENT_QUOTES);
			if($username=="" or $password=="")
			{
			$text="<font color=red>Please Enter Username/Password</font>";
			$_SESSION['type']=0;
			}
			else
			{

                     //$username = escapeshellcmd($username);
	             // $password = escapeshellarg($password);
       	       $command1 = "python imap.py $username $password";
		       $auth_status1 = trim(shell_exec($command1));
       	        if ($auth_status1)
	                    {
			        $_SESSION['login']=true;
			        $_SESSION['user']=$username;
					//complaint session added
					//echo $complaint."1 part";
					//session_start();
					//$_SESSION['complaint'] = $complaint;
				 $_SESSION['type']=1;
				 die("<script>top.location='index.php'</script>");
				}
				else 
				{
					//comlaint session added
						//$_SESSION['complaint'] = $complaint;
					require_once('conn.php');
                                   $password = SHA1($password); 
					$sql="Select username,role from users where username='$username' and password='".(($password))."'";
					$result=mysql_query($sql,$conn);
					//echo mysql_num_rows($result);
                                   if($result and mysql_num_rows($result)>0)
					{
						$row=mysql_fetch_array($result);
						$_SESSION['login']=true;
						$_SESSION['user']=$row['username'];
						$_SESSION['type']=$row['role'];
						
						//echo $_SESSION['complaint']."2 part";
						die("<script>top.location='index.php'</script>");
					
					}
				}
				$text="<font color=red>Invalid Username/Password</font>";
			}
		}

?>
<?php require_once('header.php') ?>
<script>
function validate()
{
	var f=document.form1
	if(f.username.value=="")
	{	error(document.getElementById("usernametext"))
		f.username.focus()
		return false;
	}
	if(f.password.value=="")
	{	error(document.getElementById("passwordtext"))
		f.password.focus()
		return false;
	}
	return true
}
function error(id)
{
	id.style.color='red'
}

</script>
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">

<div align="center" class="box"><?php echo $text ?></div>
<div id="left">
	<div class="box">
			<marquee>Save Energy Save Nation</marquee>
	</div>
			
	   </div>

<div id="d1">

<table width="80%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right"><span id="usernametext">Username(Webmail)</span> : </td>
<td width="25%" align="left"><input type="text" name="username" size="15"  value="<?php echo $username; ?>"/></td>
</tr>
<tr align="center">
<td width="39%" align="right"><span id="passwordtext">Password(Webmail)</span> : </td>
<td width="25%" align="left"><input type="password" name="password" size="15" /></td>
</tr>


<!--<tr align="center">
<td width="39%" align="right"><span id="passwordtext">Complaint Category</span> : </td>
<td width="25%" align="left"><select name="complaint">
								<option value="electrical">Electrical</option>
								<option value="water_supply">Water_supply</option>
								<option value="carpentry">Carpentry</option>
								<option value="sanitary">Sanitary</option>
								<option value="building">Building</option>
								<option value="horticulture">Horticulture</option>
								<option value="general">General</option>
							</select>
</td>
</tr>-->


<tr align="center">
<td>&nbsp;</td>
<td  align="left"><input type="submit" name="Submit" value="Login" /></td>
</tr></table></form>
</div><div id="d2"align="center">
<ul>
<li><a id="a1"href="#electrical">Electrical</a></li>
<li><a id="a1"href="#sanitary">sanitary</a></li>
<li><a id="a1"href="#carpentry">Carpentry</a></li>
<li><a id="a1"href="#building">Building</a></li>
<li><a id="a1"href="#horticulture">horticulture</a></li>
<li><a id="a1"href="#water_supply">Water Supply</a></li>
<li><a id="a1"href="#general">General</a></li>
</ul></div>


<div id="right">
<div id="conDiv">
<table align="center" id="t2" border="0" cellpadding="5" cellspacing="5" width="100%">

<!--Electrical Department-->

<tr ><td colspan='3' align='center'><h3 id="electrical">Electrical<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Complaint Incharge</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203
</center>
</td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Lift / Emergency</center>
</td>
<td><center>Moblie: 9489066204 / 205</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Estimation Incharge</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>-
</center></td>
</tr>
<tr>
<td>
<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>
</td>
</tr>
<tr>
<td>
<center>Appeleate Authority AE / Electrical</center></td>
<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>
<td><center>-</center></td></tr>
<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />
Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>

<!--Sanitary Department-->
<tr ><td colspan='3' align='center'><h3 id="sanitary">Sanitary<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Complaint Incharge</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203
</center>
</td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Lift / Emergency</center>
</td>
<td><center>Moblie: 9489066204 / 205</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Estimation Incharge</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>-
</center></td>
</tr>
<tr>
<td>
<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>
</td>
</tr>
<tr>
<td>
<center>Appeleate Authority AE / Electrical</center></td>
<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>
<td><center>-</center></td></tr>
<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />
Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>


<!--Carpentry Department-->
<tr ><td colspan='3' align='center'><h3 id="carpentry">Carpentry<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Complaint Incharge</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203
</center>
</td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Lift / Emergency</center>
</td>
<td><center>Moblie: 9489066204 / 205</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Estimation Incharge</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>-
</center></td>
</tr>
<tr>
<td>
<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>
</td>
</tr>
<tr>
<td>
<center>Appeleate Authority AE / Electrical</center></td>
<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>
<td><center>-</center></td></tr>
<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />
Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>


<!--Building Department-->
<tr ><td colspan='3' align='center'><h3 id="building">Building<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Complaint Incharge</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203
</center>
</td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Lift / Emergency</center>
</td>
<td><center>Moblie: 9489066204 / 205</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Estimation Incharge</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>-
</center></td>
</tr>
<tr>
<td>
<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>
</td>
</tr>
<tr>
<td>
<center>Appeleate Authority AE / Electrical</center></td>
<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>
<td><center>-</center></td></tr>
<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />
Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>


<!--Horticulture Department-->
<tr ><td colspan='3' align='center'><h3 id="horticulture">Horticulture<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Complaint Incharge</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203
</center>
</td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Lift / Emergency</center>
</td>
<td><center>Moblie: 9489066204 / 205</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Estimation Incharge</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>-
</center></td>
</tr>
<tr>
<td>
<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>
</td>
</tr>
<tr>
<td>
<center>Appeleate Authority AE / Electrical</center></td>
<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>
<td><center>-</center></td></tr>
<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />
Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>
<!--Water_supply Department-->
<tr ><td colspan='3' align='center'><h3 id="water_supply">Water Supply<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>
<td>
<center>Complaint Incharge</center>
</td><td><center>Landline: 2503836<br />
Moblie: 9489066203

</center>
</td>

<td><center>-</center></td></tr>

<tr>

<td>
<center>Lift / Emergency</center>

</td>
<td><center>Moblie: 9489066204 / 205</center></td>

<td><center>-</center></td></tr>
<tr>

<td>

<center>Estimation Incharge</center>

</td>
<td><center>Landline: 2503840<br />

Moblie: 9489066205

</center></td>

<td><center>-
</center></td>

</tr>

<tr>

<td>

<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>

</td>

</tr>

<tr>

<td>

<center>Appeleate Authority AE / Electrical</center></td>
<td><center>Landline: 2503835<br />

Moblie: 9486001188</center></td>

<td><center>-</center></td></tr>

<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />

Moblie: 9489066224</center>

</td><td><center>-</center></td></tr>




<!--General-->
<tr ><td colspan='3' align='center'><h3 id="general">General<h3></td></tr>
<tr >
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>

<tr>
<tr>
<td>
<center>Dr. G.Saravana Ilango, </center><br />
<center>ASSOCIATE DEAN<br />
Electrical issues, services & maintenance</center>
</td>
<td><center>-</center></td>
<td><center>gsilango@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Power House</center>
</td><td><center>Landline: 2503846<br />
Moblie: 9489066206 (Emergecy / Night Hours)
</center></td>
<td><center>-</center></td></tr>
<tr>

<td>

<center>Complaint Incharge</center>

</td><td><center>Landline: 2503836<br />

Moblie: 9489066203

</center>

</td>

<td><center>-</center></td></tr>
<tr>

<td>

<center>Lift / Emergency</center>
</td>

<td><center>Moblie: 9489066204 / 205</center></td>

<td><center>-</center></td></tr>
<tr>

<td>
<center>Estimation Incharge</center>
</td>
<td><center>Landline: 2503840<br />
Moblie: 9489066205
</center></td>
<td><center>-
</center></td>

</tr>
<tr>

<td>

<center><strong>Appeleate Authority</strong></center></td><td><center>-</center></td>
<td><center>-</center>

</td>

</tr>
<tr>

<td>

<center>Appeleate Authority AE / Electrical</center></td>

<td><center>Landline: 2503835<br />
Moblie: 9486001188</center></td>

<td><center>-</center></td></tr>

<tr><td><center>IE / Electrical</center></td><td><center>Landline: 2503839<br />

Moblie: 9489066224</center>
</td><td><center>-</center></td></tr>

</table>
</div>
</div>

</div>
</form>
<?php require_once('footer.php') ?>
</body>
</html>
