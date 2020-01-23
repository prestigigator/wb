<? 
include('header.php');
if($global_ust['przerwa'] == 0 OR $userData['id'] == 1){
?>

<body class="page-left-sidebar">
<? include('menu.php');?>
	<div id="content" class="site-content">
         
        <div class="apmag-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		
<? 

$dyscyplina_gra = $_GET['disc'];


switch ($dyscyplina_gra){

case "sn":
//include('sjrank.php');
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button>  <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>  <button type="submit" name="grp" value="pkn">Puchar Kontynentalny Mężczyzn</button>  <button type="submit" name="grp" value="pkk">Puchar Kontynentalny Kobiet</button> <button type="submit" name="grp" value="tck" style="background-color: green;">Turniej Czterolistnej Koniczyny</button> <button type="submit" name="grp" value="tcs">Turniej Czterech Skoczni</button> <button type="submit" name="grp" value="raw" style="background-color: grey;">Raw Air</button>
</form>
<?
$grupa = $_GET['grp'];


switch ($grupa){

case "psm":
include('rank_sj_psm.php');
break;

case "psk":
include('rank_sj_psk.php');
break;


case "pkm":
include('rank_sj_pkm.php');
break;


case "pkk":
include('rank_sj_pkk.php');
break;

case "tcs":
include('rank_sj_tcs.php');
break;

case "tck":
include('rank_sj_tck.php');
break;

}
break;







case "bn":
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button>  <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>
</form>
<?
$grupa = $_GET['grp'];


switch ($grupa){

case "psm":
include('rank_bn_psm.php');
break;

case "psk":
include('rank_bn_psk.php');
break;

}
break;








case "bt":
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button>  <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>
</form>
<?
$grupa = $_GET['grp'];


switch ($grupa){

case "psm":
include('rank_bt_psm.php');
break;

case "psk":
include('rank_bt_psk.php');
break;

}
break;









case "kn":
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button>
</form>
<?
$grupa = $_GET['grp'];


switch ($grupa){

case "psm":
include('rank_kn_psm.php');
break;

}
break;









case "na":
?>
<center>
<form method="GET" action="">
<input type="hidden" name="disc" value="<?echo $_GET['disc'];?>">
<button type="submit" name="grp" value="psm">Puchar Świata Mężczyzn</button>  <button type="submit" name="grp" value="psk">Puchar Świata Kobiet</button>
</form>
<?
$grupa = $_GET['grp'];


switch ($grupa){

case "psm":
include('rank_na_psm.php');
break;

case "psk":
include('rank_na_psk.php');
break;

}
break;










default:
echo "<center><br><br>Wybierz dyscyplinę z panelu na górze</center>";
break;

}
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