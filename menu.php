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
        
                    
					
					
					
	<?				
		/*	<div class="logo-ad-wrapper clearfix">
            <div class="apmag-container">
        		<div class="site-branding">
                    <div class="sitelogo-wrap">  
                                                <a href="">
                            <img src="logo.png" alt="Winter Bets" title="Winter Bets">
                        </a>
                                                <meta itemprop="name" content="Winter Bets – typuj sporty zimowe online!">
                    </div><!-- .sitelogo-wrap -->
                 </div><!-- .site-branding -->                
                
                                    <div class="header-ad">
                        <aside id="text-14" class="widget widget_text">			<div class="textwidget">
						
						
						<h1> GRAJ </h1> <h1> RANKINGI </h1>
						
						
						</div>
		</aside> 
                    </div><!--header ad-->
                                
                
            </div><!-- .apmag-container -->
        </div>		
					
				*/	?>
				
				
				        <div class="logo-ad-wrapper clearfix">
            <div class="apmag-container">
        		<div class="site-branding">
                    <div class="sitelogo-wrap">  

                    </div><!-- .sitelogo-wrap -->
                    <div class="sitetext-wrap">  
                   
                        <h1 class="site-title">Winter Bets</h1>
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
			  
	Zalogowany jako: <? if(!$accessToken){ echo "niezalogowany";}else{echo "<img src=\"".$userData['picture']."\" width=\"40px\" height=\"40px\" style=\"border-radius: 20px; vertical-align: middle;\"> ".$userData['first_name']." ".$userData['last_name']." <a href=\"logout.php\">[wyloguj się]</a><br><a href=\"profil.php\"><b>[USTAWIENIA GRY]</b></a> &nbsp; <a href=\"sklep.php\"><b>[SKLEP]</b></a>"; }?>
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

<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-38"><a href="?disc=sn">SKOKI NARCIARSKIE</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?disc=bn" class="discipline">BIEGI NARCIARSKIE</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?disc=bt" class="discipline">BIATHLON</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?disc=kn" class="discipline">KOMBINACJA NORWESKA</a></li>

<li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-389"><a href="?disc=na" class="discipline">NARCIARSTWO ALPEJSKIE</a></li>

</ul>
</div>
	</div>
</nav>	

	</header><!-- #masthead -->
			<center>
	<?
	$komunikat = $global_ust['komunikat_s'];
	$komunikat_tresc = $global_ust['komnikat'];
	
	
	if($komunikat == 1){
		echo "Komunikat administracji: <h2 style='color: red;'>$komunikat_tresc</h2>";
	}
	?>
	</center>