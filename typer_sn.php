<?
error_reporting(1);
require('simple_html_dom.php');

$timestamp = time();

$konkurencja = $_GET['konk'];
$dyscyplina = $_GET['dysc'];
$iduser = $_GET['ussid'];


$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

$zawody = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tc_sk WHERE cat_id = '$konkurencja' ORDER BY `id` DESC"));

$lista = $zawody['lista'];
$druzyna = $zawody['druz'];
$data_zaw= $zawody['data'];
$zawody_id = $zawody['id'];


$data_zm=date("Y-m-d H:i:s");
//$html = file_get_html('http://live.fis-ski.com/jp-3107/results-pda.htm');
//$pt = array_reverse($pty=$html->find("span[class=name]"));


$sql77="SELECT * FROM `tt_sk` WHERE `zawid`='$zawody_id'";
$result77=mysqli_query($conn, $sql77);
$liczbatyp = mysqli_num_rows($result77);


if(isset($_POST['send_psm_d'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);
$typ9= htmlspecialchars($_POST['9']);
$typ10= htmlspecialchars($_POST['10']);

$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8, $typ9, $typ10);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "INSERT INTO `tt_sk` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$typ9', '$typ10', '$timestamp')");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_psm`='$timestamp' WHERE `ussid` = '$iduser'");
				
				
			echo "Typer został wysłany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}	



if(isset($_POST['send_psm_d_d'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);


$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "INSERT INTO `tt_sk` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$timestamp')");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_psm`='$timestamp' WHERE `ussid` = '$iduser'");
				
			echo "Typer został wysłany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}	
	
	
if(isset($_POST['send_psk_d'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);
$typ9= htmlspecialchars($_POST['9']);
$typ10= htmlspecialchars($_POST['10']);

$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8, $typ9, $typ10);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "INSERT INTO `tt_sk` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$typ9', '$typ10', '$timestamp')");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_psk`='$timestamp' WHERE `ussid` = '$iduser'");
				
			echo "Typer został wysłany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}


if(isset($_POST['send_psk_d_d'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);


$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "INSERT INTO `tt_sk` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$timestamp')");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_psk`='$timestamp' WHERE `ussid` = '$iduser'");
				
				
			echo "Typer został wysłany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}



if(isset($_POST['send_pkm_d'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);
$typ9= htmlspecialchars($_POST['9']);
$typ10= htmlspecialchars($_POST['10']);

$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8, $typ9, $typ10);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "INSERT INTO `tt_sk` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$typ9', '$typ10', '$timestamp')");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_pkm`='$timestamp' WHERE `ussid` = '$iduser'");
				
				
			echo "Typer został wysłany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}	
	
	
if(isset($_POST['send_pkk_d'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);
$typ9= htmlspecialchars($_POST['9']);
$typ10= htmlspecialchars($_POST['10']);

$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8, $typ9, $typ10);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "INSERT INTO `tt_sk` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$typ9', '$typ10', '$timestamp')");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_pkk`='$timestamp' WHERE `ussid` = '$iduser'");
				
				
			echo "Typer został wysłany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}	
	
	
	
	
	
	
	
if(isset($_POST['edycja_typer-m'])){
	mysqli_query($conn, "UPDATE `tt_sk` SET `edit`=1 WHERE `ussid`='$iduser' AND `zawid`='$zawody_id'");
}
	
	
if(isset($_POST['send_psm_d-e'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);
$typ9= htmlspecialchars($_POST['9']);
$typ10= htmlspecialchars($_POST['10']);

$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8, $typ9, $typ10);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "UPDATE `tt_sk` SET `ussid`='$iduser', `zawid`='$zawody_id', `1`='$typ1', `2`='$typ2', `3`='$typ3', `4`='$typ4', `5`='$typ5', `6`='$typ6', `7`='$typ7', `8`='$typ8', `9`='$typ9', `10`='$typ10', `data`='$timestamp', `edit`=2 WHERE `ussid`='$iduser'");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_psm`='$timestamp' WHERE `ussid` = '$iduser'");
				
				
			echo "Typer został edytowany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}		
	
	
	
	
	
	
	
	
	
	if(isset($_POST['edycja_typer-k'])){
	mysqli_query($conn, "UPDATE `tt_sk` SET `edit`=1 WHERE `ussid`='$iduser' AND `zawid`='$zawody_id'");
}
	
	if(isset($_POST['send_psm_d-ek'])){ 
$typ1= htmlspecialchars($_POST['1']); 
$typ2= htmlspecialchars($_POST['2']); 
$typ3= htmlspecialchars($_POST['3']); 
$typ4= htmlspecialchars($_POST['4']); 
$typ5= htmlspecialchars($_POST['5']); 
$typ6= htmlspecialchars($_POST['6']); 
$typ7= htmlspecialchars($_POST['7']); 
$typ8= htmlspecialchars($_POST['8']);
$typ9= htmlspecialchars($_POST['9']);
$typ10= htmlspecialchars($_POST['10']);

$myArrayDru = Array($typ1, $typ2, $typ3, $typ4, $typ5, $typ6, $typ7, $typ8, $typ9, $typ10);

$liczbadupsowDRU=count(array_unique($myArrayDru));
$liczbaelementowDRU = count($myArrayDru);


if($data_zm > $data_zaw){
echo "Minął termin składania typów!";
}else{
if($liczbadupsowDRU==$liczbaelementowDRU){//jesli nie ma duplikatów to...
			
				mysqli_query($conn, "UPDATE `tt_sk` SET `ussid`='$iduser', `zawid`='$zawody_id', `1`='$typ1', `2`='$typ2', `3`='$typ3', `4`='$typ4', `5`='$typ5', `6`='$typ6', `7`='$typ7', `8`='$typ8', `9`='$typ9', `10`='$typ10', `data`='$timestamp', `edit`=2 WHERE `ussid`='$iduser'");

				mysqli_query($conn, "UPDATE `ranks_sk` SET `data_psk`='$timestamp' WHERE `ussid` = '$iduser'");
				
				
			echo "Typer został edytowany!<br>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?status=OK\">";
		
		}else{
		echo "Błędne typy!";
		echo $liczbadupsow;
		echo "<br>";
		echo $liczbaelementow;
		}
}
}
	
	
	
	
	
	
	
	
	
	
	
if($konkurencja == 'psm'){
	
	if($druzyna == 1){
		/////////// listy
$html1 = file_get_html('https://winterbets.pl/game/custom.html');
$output = $html1->find("div[class=g-lg-10 g-md-10 g-sm-9 g-xs-11 justify-left bold]"); //custom adres


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_sk` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));


?>
<center>	

<b><? echo $zawody['nazwa']; ?>
</b><br>
Data: <b><? echo $zawody['data']; ?></b><br>

<img src="<? echo $zawody['picture']; ?>" width="200" height="220"/>
<br>
<br>
<span style="font-size: 90%;"><? echo $zawody['opis']; ?></span>
<br><br>
<? if($data_zm > $data_zaw){
	echo "Minął termin wysyłania typów!<br>Twoje typy:<br>";
	?>
	1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
	<?	
}else{
	if($usertyp['ussid'] == $iduser ){
		?>Już wysyłałeś typ!<br>Twoj typ na zawody:<br><br>
1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
<?		
	}else{
	?>
<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">


Drużyna 1: <select name="1" id="1">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
	<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 2: <select name="2" id="2">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 3: <select name="3" id="3">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 4: <select name="4" id="4">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 5: <select name="5" id="5">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 6: <select name="6" id="6">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 7: <select name="7" id="7">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 8: <select name="8" id="8">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
REKLAMA
<br>
<br>
<input type="hidden" name="send_psm_d">
<button type="submit" name="typer">Wyślij Typy</button>
 
</form> <br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad_k.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>

<?	}}
	}else{
		
		
				/////////// listy
$html1 = file_get_html($lista);
$pt = $html1->find("div[class=".$zawody['modyfikator']."]"); //custom adres  g-lg-14 g-md-14 g-sm-13 g-xs-11 justify-left bold


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_sk` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));

?>
<center>	
<b><? echo $zawody['nazwa']; ?>
</b><br>
Data: <b><? echo $zawody['data']; ?></b><br>

<img src="<? echo $zawody['picture']; ?>" width="200" height="220"/>
<br>
<br>
<span style="font-size: 90%;"><? echo $zawody['opis']; ?></span>
<br><br>
<? if($data_zm > $data_zaw){
	echo "Minął termin wysyłania typów!<br>Twoje typy:<br>";
	?>
1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
	<?	
}else{
	if($usertyp['ussid'] == $iduser ){
		if($usertyp['edit'] == 1){
			?>
			
			
			<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">

Zawodnik 1: <select name="1" id="1">
<option value="<?echo $usertyp['1'];?>" selected=""><?echo $usertyp['1'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 2: <select name="2" id="2">
<option value="<?echo $usertyp['2'];?>" selected="" ><?echo $usertyp['2'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 3: <select name="3" id="3">
<option value="<?echo $usertyp['3'];?>" selected=""><?echo $usertyp['3'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 4: <select name="4" id="4">
<option value="<?echo $usertyp['4'];?>" selected=""><?echo $usertyp['4'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 5: <select name="5" id="5">
<option value="<?echo $usertyp['5'];?>" selected=""><?echo $usertyp['5'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 6: <select name="6" id="6">
<option value="<?echo $usertyp['6'];?>" selected=""><?echo $usertyp['6'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 7: <select name="7" id="7">
<option value="<?echo $usertyp['7'];?>" selected=""><?echo $usertyp['7'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 8: <select name="8" id="8">
<option value="<?echo $usertyp['8'];?>" selected=""><?echo $usertyp['8'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 9: <select name="9" id="9">
<option value="<?echo $usertyp['9'];?>" selected=""><?echo $usertyp['9'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 10: <select name="10" id="10">
<option value="<?echo $usertyp['10'];?>" selected=""><?echo $usertyp['10'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
<br>
<input type="hidden" name="send_psm_d-e">
<button type="submit" name="typer-e">Edytuj Typy</button>
 
 </form> <br>
			Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
			<?			
		}else{
		
		
		?>Już wysyłałeś typ!<br>Twoj typ na zawody:<br><br>
1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
<br>

<?
if($usertyp['edit'] == 0){
	?>
<form action="" method="POST" name="typer-edycja">
<input type="submit" value="Edytuj Typy" name="edycja_typer-m">
</form> 
<?}?>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>

		<?
		
		}
}else{
	?>
<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">

Zawodnik 1: <select name="1" id="1">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 2: <select name="2" id="2">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 3: <select name="3" id="3">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 4: <select name="4" id="4">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 5: <select name="5" id="5">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 6: <select name="6" id="6">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 7: <select name="7" id="7">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 8: <select name="8" id="8">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 9: <select name="9" id="9">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 10: <select name="10" id="10">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
<br>
<input type="hidden" name="send_psm_d">
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 
 <br>
 Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
<?}}}
}


















if($konkurencja == 'psk'){
	
	if($druzyna == 1){
		/////////// listy
$html1 = file_get_html('https://winterbets.pl/game/custom.html');
$output = $html1->find("div[class=g-lg-10 g-md-10 g-sm-9 g-xs-11 justify-left bold]"); //custom adres


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_sk` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));


?>
<center>	

<b><? echo $zawody['nazwa']; ?>
</b><br>
Data: <b><? echo $zawody['data']; ?></b><br>

<img src="<? echo $zawody['picture']; ?>" width="200" height="220"/>
<br>
<br>
<span style="font-size: 90%;"><? echo $zawody['opis']; ?></span>
<br><br>
<? if($data_zm > $data_zaw){
	echo "Minął termin wysyłania typów!<br>Twoje typy:<br>";
	?>
	1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad_d.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
	<?	
}else{
	if($usertyp['ussid'] == $iduser ){
		?>Już wysyłałeś typ!<br>Twoj typ na zawody:<br><br>
1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
<?		
	}else{
	?>
<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">


Drużyna 1: <select name="1" id="1">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
	<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 2: <select name="2" id="2">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 3: <select name="3" id="3">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 4: <select name="4" id="4">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 5: <select name="5" id="5">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 6: <select name="6" id="6">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 7: <select name="7" id="7">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Drużyna 8: <select name="8" id="8">
<option value="" disabled="" selected="" style="display:none;">Wybierz drużynę...</option>
		<? 
		foreach ($output as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
REKLAMA
<br>
<br>
<input type="hidden" name="send_psk_d_d">
<button type="submit" name="typer">Wyślij Typy</button>
 
</form> <br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>

<?	}}

		
	}else{
		$html1 = file_get_html($lista);
$pt = $html1->find("div[class=".$zawody['modyfikator']."]"); //custom adres

/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_sk` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));

?>
<center>	
<b><? echo $zawody['nazwa']; ?>
</b><br>
Data: <b><? echo $zawody['data']; ?></b><br>

<img src="<? echo $zawody['picture']; ?>" width="200" height="220"/>
<br>
<br>
<span style="font-size: 90%;"><? echo $zawody['opis']; ?></span>
<br><br>
<? if($data_zm > $data_zaw){
	echo "Minął termin wysyłania typów!<br>Twoje typy:<br>";
	?>
1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad_k.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
	<?	
}else{
	if($usertyp['ussid'] == $iduser ){
		if($usertyp['edit'] == 1){
			?>
			
			
			<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">

Zawodniczka 1: <select name="1" id="1">
<option value="<?echo $usertyp['1'];?>" selected=""><?echo $usertyp['1'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 2: <select name="2" id="2">
<option value="<?echo $usertyp['2'];?>" selected="" ><?echo $usertyp['2'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 3: <select name="3" id="3">
<option value="<?echo $usertyp['3'];?>" selected=""><?echo $usertyp['3'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 4: <select name="4" id="4">
<option value="<?echo $usertyp['4'];?>" selected=""><?echo $usertyp['4'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 5: <select name="5" id="5">
<option value="<?echo $usertyp['5'];?>" selected=""><?echo $usertyp['5'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 6: <select name="6" id="6">
<option value="<?echo $usertyp['6'];?>" selected=""><?echo $usertyp['6'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 7: <select name="7" id="7">
<option value="<?echo $usertyp['7'];?>" selected=""><?echo $usertyp['7'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 8: <select name="8" id="8">
<option value="<?echo $usertyp['8'];?>" selected=""><?echo $usertyp['8'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 9: <select name="9" id="9">
<option value="<?echo $usertyp['9'];?>" selected=""><?echo $usertyp['9'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 10: <select name="10" id="10">
<option value="<?echo $usertyp['10'];?>" selected=""><?echo $usertyp['10'];?></option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
<br>
<input type="hidden" name="send_psk_d-ek">
<button type="submit" name="typer-e">Edytuj Typy</button>
 
 </form> <br>
			Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad_k.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
			<?			
		}else{
		
		
		?>Już wysyłałeś typ!<br>Twoj typ na zawody:<br><br>
1. <?echo $usertyp['1'];?><br>
2. <?echo $usertyp['2'];?><br>
3. <?echo $usertyp['3'];?><br>
4. <?echo $usertyp['4'];?><br>
5. <?echo $usertyp['5'];?><br>
6. <?echo $usertyp['6'];?><br>
7. <?echo $usertyp['7'];?><br>
8. <?echo $usertyp['8'];?><br>
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
<br>

<?
if($usertyp['edit'] == 0){
	?>
<form action="" method="POST" name="typer-edycja">
<input type="submit" value="Edytuj Typy" name="edycja_typer-k">
</form> 
<?}?>
Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad_k.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>

		<?
		
		}
}else{
	?>
<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">

Zawodniczka 1: <select name="1" id="1">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 2: <select name="2" id="2">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 3: <select name="3" id="3">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 4: <select name="4" id="4">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 5: <select name="5" id="5">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 6: <select name="6" id="6">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 7: <select name="7" id="7">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 8: <select name="8" id="8">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 9: <select name="9" id="9">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodniczka 10: <select name="10" id="10">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodniczkę...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
<br>
<input type="hidden" name="send_psk_d">
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 
 <br>
 Najczęściej wybierani:
<? if($liczbatyp > 4){ ?>
<div>
<? include('testad_k.php'); ?>
</div>
<?}else{echo "<br><br>Najczęściej wybierani pojawią się, gdy zostanie wysłanych minimum 5 typów!";}?>
<?}}}
}































if($konkurencja == 'pkm'){
	?>
<center>	

<b><? echo $zawody['nazwa']; ?>
</b><br>
Data: <b><? echo $zawody['data']; ?></b><br>

<img src="<? echo $zawody['picture']; ?>" width="200" height="220"/>
<br>
<br>
<span style="font-size: 90%;"><? echo $zawody['opis']; ?></span>
<br><br>


	
<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">

Zawodnik 1: <select name="1" id="1">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 2: <select name="2" id="2">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 3: <select name="3" id="3">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 4: <select name="4" id="4">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 5: <select name="5" id="5">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 6: <select name="6" id="6">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 7: <select name="7" id="7">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 8: <select name="8" id="8">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 9: <select name="9" id="9">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 10: <select name="10" id="10">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
<br>
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 
	<?
}



































if($konkurencja == 'pkk'){
	?>
<center>	

<b><? echo $zawody['nazwa']; ?>
</b><br>
Data: <b><? echo $zawody['data']; ?></b><br>

<img src="<? echo $zawody['picture']; ?>" width="200" height="220"/>
<br>
<br>
<span style="font-size: 90%;"><? echo $zawody['opis']; ?></span>
<br><br>


	
<form action="index.php?disc=<?echo $dyscyplina;?>&grp=<?echo $konkurencja;?>" method="POST" class="typer_frm">

Zawodnik 1: <select name="1" id="1">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 2: <select name="2" id="2">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 3: <select name="3" id="3">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 4: <select name="4" id="4">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 5: <select name="5" id="5">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 6: <select name="6" id="6">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 7: <select name="7" id="7">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 8: <select name="8" id="8">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 9: <select name="9" id="9">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br><br>

Zawodnik 10: <select name="10" id="10">
<option value="" disabled="" selected="" style="display:none;">Wybierz zawodnika...</option>
	<? 
		foreach ($pt as $options) {

			$new_zawodnik = trim(preg_replace('/\t+/', '', $options->plaintext));
			
			echo "<option value=\"$new_zawodnik\">$new_zawodnik</option>";
			}
	?>
</select>
<br>
<br>
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 
	<?
}


?>
</center>