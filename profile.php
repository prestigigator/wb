<?
	//id konta z profile.php?id=XX
	$urlcut = $_SERVER['REQUEST_URI'];
	$idkonta = explode("profile.php?id=", $urlcut);
	$id_kon = $idkonta[1];

$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

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

$sql1="SELECT * FROM `users` WHERE `id`='$id_kon'";
$result1=mysqli_query($conn, $sql1);	
$user11 = mysqli_fetch_assoc($result1);

$imienazwisko = $user11['first_name']." ".$user11['last_name']." ";


if(!$accessToken){
	echo $output_nologin;
}else{



if($user11['admin'] == 1){
		$koszulka = "red";
		$napis = "<h3> Administrator </h3>";
}else{

if($user11['mode'] == 1){
		$koszulka = 'orange';
		$napis = "<h3> Moderator </h3>";

}else{
	$koszulka = "white";
}
}
	
echo "<center>";	
	    echo '<h1>Informacje o profilu</h1>';
        echo '<img src="'.$user11['picture'].'" width="160" height="160" border="12" style="border-color: '.$koszulka.';">';
		if($napis == NULL) echo "<br>";
		else echo $napis;
		echo  '<br>Imię i nazwisko: <b>' . $user11['first_name'].' '.$user11['last_name'].'</b>';
		echo  '<br/>Data dołączenia: ' . $user11['created'];
		echo  '<br/>Opis: <div style="color: gold;width: 80%;"> ' . $user11['bio'] . '</div>';
		
}
?>


		</main><!-- #main -->
	</div><!-- #primary -->

<!--Secondary-left-sidebar--></div>

	</div><!-- #content -->
	</body>
	</html>