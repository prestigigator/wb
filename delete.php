<?
include('header.php');
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
$id_kon = $userData['id'];


if (isset($_POST['usuwamwpizdu'])) {
	
		mysqli_query("DELETE FROM `users` WHERE `users`.`id` = '$id_kon'")

or die ('Podczas usuwania wystąpił błąd!'); 

// Remove access token from session
unset($_SESSION['facebook_access_token']);

// Remove user data from session
unset($_SESSION['userData']);

	echo "<center><h1>Done.</h1><script>alert('Done');top.location.href = 'https://winterbets.pl/games/';</script>";
}else{
	
	echo '<center><h1>XD</h1>';
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
	</body>
	</html>