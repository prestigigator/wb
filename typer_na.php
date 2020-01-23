<?
error_reporting(1);
require('simple_html_dom.php');

$timestamp = time();

$konkurencja = $_GET['konk'];
$dyscyplina = $_GET['dysc'];
$iduser = $_GET['ussid'];


$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

$zawody = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tc_na WHERE cat_id = '$konkurencja' ORDER BY `id` DESC"));

$lista = $zawody['lista'];
$zjazd = $zawody['druz'];
$data_zaw= $zawody['data'];
$zawody_id = $zawody['id'];


$data_zm=date("Y-m-d H:i:s");
//$html = file_get_html('http://live.fis-ski.com/jp-3107/results-pda.htm');
//$pt = array_reverse($pty=$html->find("span[class=name]"));





if(isset($_POST['send_psk'])){ 
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
			
				mysqli_query($conn, "INSERT INTO `tt_na` (`ussid`, `zawid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `data`) VALUES ('$iduser', '$zawody_id', '$typ1', '$typ2', '$typ3', '$typ4', '$typ5', '$typ6', '$typ7', '$typ8', '$typ9', '$typ10', '$timestamp')");

				
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
	
	
	

	
	
	
if($konkurencja == 'psm'){
	
	if($zjazd == 1){
		/////////// listy
$html1 = file_get_html('https://winterbets.pl/game/custom.html');
$pt = $html1->find("div[class=g-lg-10 g-md-10 g-sm-9 g-xs-11 justify-left bold]"); //custom adres


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_na` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));


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
	echo "<center>Minął termin wysyłania typów!<br>Twoje typy:<br>";
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
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
<?		
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
<input type="hidden" name="send_psm">
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 


<?	}}
	}else{

		/////////// listy
$html1 = file_get_html('https://winterbets.pl/game/custom.html');
$pt = $html1->find("div[class=g-lg-10 g-md-10 g-sm-9 g-xs-11 justify-left bold]"); //custom adres


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_na` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));


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
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
<?		
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
	<?}
}
}}





if($konkurencja == 'psk'){
	
	if($zjazd == 1){
		/////////// listy
$html1 = file_get_html('https://winterbets.pl/game/custom.html');
$pt = $html1->find("div[class=g-lg-10 g-md-10 g-sm-9 g-xs-11 justify-left bold]"); //custom adres


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_na` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));


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
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
<?		
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
<input type="hidden" name="send_psk">
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 


<?	}}
	}else{

		/////////// listy
$html1 = file_get_html('https://www.fis-ski.com/DB/general/results.html?sectorcode=AL&raceid=100027');
$pt = $html1->find("div[class=g-lg-18 g-md-18 g-sm-16 g-xs-16 justify-left bold]"); //custom adres


/////////koniec poboru
$usertyp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tt_na` WHERE `ussid`='$iduser' AND `zawid`='$zawody_id' ORDER BY `data` DESC"));


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
9. <?echo $usertyp['9'];?><br>
10. <?echo $usertyp['10'];?><br>
<?		
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
<input type="hidden" name="send_psk">
<button type="submit" name="typer">Wyślij Typy</button>
 
 </form> 
	<?}
}}}
?>
</center>