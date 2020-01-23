<?
$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");
?>
<br>
<form method="post" action="">
<input name="generalka" type="submit" value="Klasyfikacja Generalna TCS"> <input name="obecny" type="submit" value="Oberstdorf"> <input name="gapa" type="submit" value="Ga-Pa"> <input name="inns" type="submit" value="Innsbruck"> <input name="bhofen" type="submit" value="Bischofshofen">
</form>


<? if (!isset($_POST['generalka']) AND !isset($_POST['obecny']) AND !isset($_POST['gapa']) AND !isset($_POST['inns']) AND !isset($_POST['bhofen'])){
	?>
	
<center>
Klasyfikacja generalna TCS:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_tcs` > 0 ORDER BY `skoki_tcs` DESC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_tcs` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_tcs` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_tcs'];



while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_tcs'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_tcs` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=1+$wynik1[0];
$id_uss = $r['ussid'];

$strata = $r['skoki_tcs']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['ussid'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}

if($pozycja == 1){
	echo "<tr height=\"30\" style=\"background-color: gold;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a>  &nbsp; <img src=\"https://upload.wikimedia.org/wikipedia/de/thumb/8/82/Vierschanzentournee_Logo.svg/292px-Vierschanzentournee_Logo.svg.png\" width=\"20px\"></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 2){
	echo "<tr height=\"30\" style=\"background-color: silver;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 3){
	echo "<tr height=\"30\" style=\"background-color: brown;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja > 3){
	echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}

		


}
?>
</table>
<?}?>

<?
if(isset($_POST['generalka'])){
?>

<center>
Klasyfikacja generalna TCS:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_tcs` > 0 ORDER BY `skoki_tcs` DESC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_tcs` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_tcs` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_tcs'];



while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_tcs'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_tcs` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=1+$wynik1[0];
$id_uss = $r['ussid'];

$strata = $r['skoki_tcs']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['ussid'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}

if($pozycja == 1){
	echo "<tr height=\"30\" style=\"background-color: gold;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a> &nbsp; <img src=\"https://upload.wikimedia.org/wikipedia/de/thumb/8/82/Vierschanzentournee_Logo.svg/292px-Vierschanzentournee_Logo.svg.png\" width=\"20px\"></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 2){
	echo "<tr height=\"30\" style=\"background-color: silver;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 3){
	echo "<tr height=\"30\" style=\"background-color: brown;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja > 3){
	echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}

		


}
?>
</table>
<?}?>


<?
if(isset($_POST['obecny'])){
?>

<center>
Wyniki Oberstdorf:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_tcs_o` > 0 ORDER BY `joined_tcs_o` ASC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_tcs_o` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_tcs_o` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_tcs_o'];


while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_tcs_o'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_tcs_o` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=$r['joined_tcs_o']-1;
$id_uss = $r['ussid'];

$strata = $r['skoki_tcs_o']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['id'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}


if($pozycja == 1){
	echo "<tr height=\"30\" style=\"background-color: gold;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_o']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 2){
	echo "<tr height=\"30\" style=\"background-color: silver;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_o']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 3){
	echo "<tr height=\"30\" style=\"background-color: brown;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_o']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja > 3){
	echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_o']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}

		


}
?>
</table>
<?}?>



<?
if(isset($_POST['gapa'])){
?>

<center>
Wyniki Ga-Pa:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_tcs_g` > 0 ORDER BY `joined_tcs_g` ASC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_tcs_g` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_tcs_g` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_tcs_g'];


while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_tcs_g'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_tcs_g` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=$r['joined_tcs_g']-1;
$id_uss = $r['ussid'];

$strata = $r['skoki_tcs_g']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['id'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}


if($pozycja == 1){
	echo "<tr height=\"30\" style=\"background-color: gold;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_g']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 2){
	echo "<tr height=\"30\" style=\"background-color: silver;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_g']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 3){
	echo "<tr height=\"30\" style=\"background-color: brown;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_g']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja > 3){
	echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_g']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}

		


}
?>
</table>
<?}?>


<?
if(isset($_POST['inns'])){
?>

<center>
Wyniki Innsbruck:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_tcs_i` > 0 ORDER BY `joined_tcs_i` ASC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_tcs_i` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_tcs_i` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_tcs_i'];


while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_tcs_i'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_tcs_i` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=$r['joined_tcs_i']-1;
$id_uss = $r['ussid'];

$strata = $r['skoki_tcs_i']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['id'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}


if($pozycja == 1){
	echo "<tr height=\"30\" style=\"background-color: gold;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_i']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 2){
	echo "<tr height=\"30\" style=\"background-color: silver;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_i']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 3){
	echo "<tr height=\"30\" style=\"background-color: brown;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_i']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja > 3){
	echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_i']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}

		


}
?>
</table>
<?}?>




<?
if(isset($_POST['bhofen'])){
?>

<center>
Wyniki Bischofshofen:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_tcs_b` > 0 ORDER BY `joined_tcs_b` ASC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_tcs_b` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_tcs_b` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_tcs_b'];


while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_tcs_b'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_tcs_b` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=$r['joined_tcs_b']-1;
$id_uss = $r['ussid'];

$strata = $r['skoki_tcs_b']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['id'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}


if($pozycja == 1){
	echo "<tr height=\"30\" style=\"background-color: gold;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_b']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 2){
	echo "<tr height=\"30\" style=\"background-color: silver;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_b']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja == 3){
	echo "<tr height=\"30\" style=\"background-color: brown;\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_b']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}
if($pozycja > 3){
	echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\"><img src=\"".$usersdata['picture']."\" width=\"20px\" height=\"20px\"><a href=\"profile.php?id=".$id_uss."\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</a></td><td width=\"7%\" align=\"center\">".$r['skoki_tcs_b']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
}

		


}
?>
</table>
<?}?>
</center>