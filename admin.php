<? 
include('header.php');
?>
<body class="page-left-sidebar">
<header id="masthead" class="site-header">    
    
                <div class="top-menu-wrapper has_menu clearfix">
            <div class="apmag-container">
                        <div class="current-date">Lang: PL</div>
                           
                <nav id="top-navigation" class="top-main-navigation">
                            <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false">Top Menu</button>
                            <div class="top_menu_left"><ul id="menu-gora" class="menu"><li id="menu-item-111" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-111"><a href="https://play.google.com/store/apps/details?id=com.m.winterbets" style="color: gold;" >Pobierz aplikację w GooglePlay</a></li>
<li id="menu-item-698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-698"><a href="https://patronite.pl/presti">Wspieraj nas na Patronite</a></li>


</a></li>
<?
if ($userData['admin'] == 1){?>
<li id="menu-item-698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-698"><a href="admin.php" style="color: red;">Panel Administratora</a></li>
<?}?>

<? 
if ($userData['mode'] == 1){?>
<li id="menu-item-698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-698"><a href="mode.php" style="color: green;">Panel Moderatora</a></li>
<?}?>

<? 
if ($userData['test'] == 1){?>
<li id="menu-item-698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-698"><a href="tester.php" style="color: gray;">Panel Testera</a></li>
<?}?>

<? 
if ($userData['patronite'] == 1){?>
<li id="menu-item-698" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-698"><a href="admin.php">Panel Patronite</a></li>
<?}?>


</ul></div>                </nav><!-- #site-navigation -->
                                    </div><!-- .apmag-container -->
        </div><!-- .top-menu-wrapper -->
        
                   
				
				        <div class="logo-ad-wrapper clearfix">
            <div class="apmag-container">
        		<div class="site-branding">
                    <div class="sitelogo-wrap">  

                    </div><!-- .sitelogo-wrap -->
                    <div class="sitetext-wrap">  
                   
                        <h1 class="site-title">Winter Bets Administrator</h1>
                        <small>compatible with &nbsp; &nbsp;<img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/07/F%C3%A9d%C3%A9ration_internationale_de_ski_%28logo%29.svg/175px-F%C3%A9d%C3%A9ration_internationale_de_ski_%28logo%29.svg.png" width="20px" height="20px" vertical-align="middle"></small>
						
						
                    </div><!-- .sitetext-wrap -->
                 </div><!-- .site-branding -->                
              <div class="header-ad" style="">
<div class="divTable9">
<div class="divTableBody9">
<div class="divTableRow9">
<div class="divTableCell9">
				<h1><a href="index.php">Graj</a>  </h3>
				</div>

<div class="divTableCell9">				
				<h1><a href="ranks.php">Rankingi</a></h3>
				</div>

				<div class="divTableCell9">
			  
	Zalogowany jako: <? if(!$accessToken){ echo "niezalogowany";}else{echo "<img src=\"".$userData['picture']."\" width=\"40px\" height=\"40px\" style=\"border-radius: 20px; vertical-align: middle;\"> ".$userData['first_name']." ".$userData['last_name']." <a href=\"logout.php\">[wyloguj się]</a>"; }?>
			  </div>
			  
				</div></div></div>
				
				
              </div>

            </div><!-- .apmag-container -->
        </div><!-- .logo-ad-wrapper -->
				
				
        
		<hr>
		
		<nav id="site-navigation" class="main-navigation">
			<div class="apmag-container">
		<div class="menu">
<ul id="menu-primary-menu" class="menu nav-menu" aria-expanded="false">

<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-38"><a href="?pnl=add">DODAJ KONKURS</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?pnl=edd" class="discipline">EDYTUJ KONKURS</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?pnl=rnk" class="discipline">KLASYFIKACJE</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?pnl=usr" class="discipline">UŻYTKOWNICY</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?pnl=oth" class="discipline">DODATKI</a></li>

</ul>
</div>
	</div>
</nav>	
		
	
	</header><!-- #masthead -->
	<div id="content" class="site-content">
         
        <div class="apmag-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<? 
if(!$accessToken){
	
echo $output_nologin;

}else{	

if($userData['admin'] == 1){

$panel = $_GET['pnl'];
$grupa = $_GET['grp'];
$iduser = $userData['id'];


switch ($panel){


case "add":
echo "dodawanie konkursu";
admin_wczytaj($panel, $iduser);
break;


case "edd":
echo "edycje konkursu";
admin_wczytaj($panel, $iduser);
break;


case "rnk":
echo "zarządzanie rankingami"
admin_wczytaj($panel, $iduser);;
break;


case "usr":
echo "zarządzanie użytkownikami";
admin_wczytaj($panel, $iduser);
break;


case "oth":
echo "pozostałe funkcje zarządzania typerem";
admin_wczytaj($panel, $iduser);
break;


default:
echo "Wybierz akcję z menu powyżej! <br><br> API STATUS: connected!";
break;

}

}else{
	
echo "Nie masz wystarczających uprawnień kolego!";

}
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
</script>*/?>
</body>
</html>