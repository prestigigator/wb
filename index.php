<? 
include('header.php');

if($global_ust['przerwa'] == 0 OR $userData['id'] == 1){

?>
<body class="page-left-sidebar">
<? 
include('menu.php');
?>
	<div id="content" class="site-content">
         
        <div class="apmag-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<? 
if(!$accessToken){
	
echo $output_nologin;

}else{	
	
$dyscyplina_gra = $_GET['disc'];
$grupa = $_GET['grp'];


switch ($dyscyplina_gra){



//////////////////////////////////////////////
case "sn":
$iduser = $userData['id'];
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button> <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button> <button type="submit" name="grp" value="pkm">Puchar Kontynetalny Mężczyzn</button> <button type="submit" name="grp" value="pkk">Puchar Kontynetalny Kobiet</button>
</form>
<?

switch ($grupa){

case "psm":
echo "Panel typowania PŚ Mężczyzn";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;

case "psk":
echo "Panel typowania PŚ Kobiet";
plik_wczytaj($dyscyplina_gra,$grupa,$iduser);
break;

case "pkm":
echo "Panel typowania PK Mężczyzn";
plik_wczytaj($dyscyplina_gra,$grupa);
break;

case "pkk":
echo "Panel typowania PK Kobiet";
plik_wczytaj($dyscyplina_gra,$grupa);
break;

}
break;
//////////////////////////////////////////////





//////////////////////////////////////////////
case "bn":
$iduser = $userData['id'];
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button> <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>
</form>
<?

switch ($grupa){

case "psm":
echo "Panel typowania PŚ Mężczyzn";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;

case "psk":
echo "Panel typowania PŚ Kobiet";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;


}
break;
//////////////////////////////////////////////




//////////////////////////////////////////////
case "bt":
$iduser = $userData['id'];
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button> <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>
</form>
<?

switch ($grupa){

case "psm":
echo "Panel typowania PŚ Mężczyzn";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;

case "psk":
echo "Panel typowania PŚ Kobiet";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;


}
break;
//////////////////////////////////////////////




//////////////////////////////////////////////
case "kn":
$iduser = $userData['id'];
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button>
</form>
<?

switch ($grupa){

case "psm":
echo "Panel typowania PŚ Mężczyzn";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;

}
break;
//////////////////////////////////////////////



//////////////////////////////////////////////
case "na":
$iduser = $userData['id'];
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button> <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>
</form>
<?

switch ($grupa){

case "psm":
echo "Panel typowania PŚ Mężczyzn";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;

case "psk":
echo "Panel typowania PŚ Kobiet";
plik_wczytaj($dyscyplina_gra, $grupa, $iduser);
break;


}
break;
//////////////////////////////////////////////





//////////////////////////////////////////////
default:
echo "<center><br><br>Wybierz dyscyplinę z panelu na górze</center>";
break;
//////////////////////////////////////////////
}



}

///////////////////////////////////////////////////////////////////////////////////////////////////wysyłanie typerków//////////////////////////




?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<div id="secondary-left-sidebar" class="widget-area" role="complementary">
   
   <div class="chat">Chat graczy:
  
   <div class="chatContainer">
   <div class="chatMessages"></div>

   <div class="chatBottom">
   <? if(!$accessToken){ echo "";}else{?>
      <form action="#" onSubmit='return false;' id="chatForm">
         <input type="hidden" id="user_name" value="<? echo $userData['first_name']." ".$userData['last_name'];?>"/>
		 <input type="hidden" id="user_id" value="<? echo $userData['id']; ?>" />
         <input type="text" name="text_chat" id="text_chat" value="" placeholder="Wpisz wiadomość" />
         <input type="submit" name="submit" value="Wyślij" />
   </form><? }?>
   </div>
</div>
   </div>



</div><!--Secondary-left-sidebar--></div>

	</div><!-- #content -->
<?/*
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- winterbets_baner_top -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4050047055641922"
     data-ad-slot="7932917417"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>*/
}else{
	
echo "Trwa aktualizacja typera, prosimy o cierpliwość do godziny 21:30 - potem złość kierować pod mail@fis-ski.com";

}
?>
</body>
</html>