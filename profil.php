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
	
$sql1="SELECT * FROM `users` WHERE `id`='$id_kon'";
$result1=mysqli_query($conn, $sql1);	
$user11 = mysqli_fetch_assoc($result1);


if(!$accessToken){
	echo $output_nologin;

}else{
	
echo "<center>";	
	    echo '<h1>Twój profil</h1>';
        echo '<img src="'.$user11['picture'].'" width="160" height="160" border="12" style="border-color: '.$koszulka.';">';
		echo  '<br/><br>Imię i last_name: <b>' . $user11['first_name'].' '.$user11['last_name'].'</b>';
		echo  '<br/>Data dołączenia: ' . $user11['created'];
		//echo  '<br/><small><a href="edit_profile.php" id="no-link" style="color: 00cccc;">[edytuj]</a></small>&nbsp;Opis: <div style="color: gold;width: 80%;"> ' . $user11['bio'] . '</div>';
		?>
		<br><br>
<br>
<br>
<br>

<form action="delete.php" method="POST" name="delete" onsubmit="return confirm('Jesteś pewien?\nPo usunięciu konta wszystkie dane, rezultaty zostaną bezpowrotnie usunięte.');">
<input type="hidden" name="usuwamwpizdu">
<input type="submit" value="Usuń konto">
</form>
<?	
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