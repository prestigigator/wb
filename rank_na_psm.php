<?
$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");
?>
<form method="post" action="">
<input name="generalka" type="submit" value="Klasyfikacja Generalna"> <input name="obecny" type="submit" value="Obecny Konkurs"> 
</form>

<?
if(isset($_POST['generalka'])){
?>

<center>
Klasyfikacja generalna typera:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_psk` > 0 ORDER BY `skoki_psk` DESC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_psk` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_psk` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_psk'];


while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_psk'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_psk` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=1+$wynik1[0];
$id_uss = $r['ussid'];

$strata = $r['skoki_psk']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['id'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}


echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</td><td width=\"7%\" align=\"center\">".$r['skoki_psk']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
		


}
?>
</table>
<?}?>


<?
if(isset($_POST['obecny'])){
?>

<center>
Ostatnie zawody:<br>
<table align="center" border="1" cellspacing="1" cellpadding="2" width="75%">
<tr height="30"><td width="5%" align="center">POZ</td><td width="6%" align="center">Nat</td><td width="75%" align="center">Imię i nazwisko</td><td width="7%" align="center">PKT</td><td width="7%" align="center">Strata</td></tr>
<?
$sql88="SELECT * FROM `ranks_sk` WHERE `ussid` !=1 AND `skoki_psk_o` > 0 ORDER BY `joined_psk` ASC";
$result88=mysqli_query($conn, $sql88);

$sql70="SELECT `skoki_psk_o` FROM `ranks_sk` WHERE `ussid` !=1 ORDER BY `skoki_psk_o` DESC LIMIT 1";
$tete71 = mysqli_fetch_assoc(mysqli_query($conn, $sql70));
$najlepszy171 = $tete71['skoki_psk_o'];


while($r = mysqli_fetch_assoc($result88)) {
$points = $r['skoki_psk_o'];
$wynik10=mysqli_query($conn, "SELECT count(*) FROM `ranks_sk` WHERE `skoki_psk_o` > '$points' AND `ussid` !=1");
$wynik1=mysqli_fetch_array($wynik10);
$pozycja=$r['joined_psk']-1;
$id_uss = $r['ussid'];

$strata = $r['skoki_psk_o']-$najlepszy171;

$usersdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_uss'"));

if($r['id'] == $userData['id']){
	$mojeid = "<b><i>";
	$mojeid1 = "</b></i>";
}else{
	$mojeid = "";
	$mojeid1 = "";
}


echo "<tr height=\"30\"><td width=\"5%\" align=\"center\">".$pozycja."</td><td width=\"6%\" align=\"center\"><img src=\"".$usersdata['nation'].".png\" width=\"20px\" height=\"10px\"></td><td width=\"75%\" align=\"center\">".$mojeid.$usersdata['first_name']." ".$usersdata['last_name'].$mojeid1."</td><td width=\"7%\" align=\"center\">".$r['skoki_psk_o']."</td><td width=\"7%\" align=\"center\">".$strata."</td></tr>";
		


}
?>
</table>
<?}?>
</center>