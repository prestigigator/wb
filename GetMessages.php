<?php
$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");
$db = new PDO('mysql:host=HOST;dbname=LGNDB','DBF','PASS');

$time_now = time();
$max_time = $time_now - 86400;

$query = $db->prepare("SELECT * FROM messages WHERE time > $max_time");
$query ->execute();

$userdata = $_GET['ussid'];




while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
   $name = $fetch['name'];
   $message = $fetch['message'];
   $id = $fetch['id'];
   $ussid = $fetch['ussid'];
   
   $nation_t = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $ussid"));
   $nation = $nation_t['nation'];
   
   
//////// ADMIN - FUNKCJE CHAT ////////   
   $cenzura_zmienna = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $userdata"));
   $admin_tak = $cenzura_zmienna['admin'];
   $mode_tak = $cenzura_zmienna['mode'];

	if($mode_tak == 1 || $admin_tak == 1){
		     $cenzura_but = "<a href=\"?usun_chat=$id\">[usuń]</a>";
	   }
 
   if($ussid == 1 OR $ussid == 2){
		   $ranga = "</b><small>[A]</small><b> ";
		   $ranga_color = "<span style='color: red;'>";
		   $ranga_color_end = "</span>";
		   
		   
	   }else{
		   $ranga = "";
		   $ranga_color = "";
		   $ranga_color_end = "";
	   }
////////////////////////////////////////	  
 
 
   if($userdata == $ussid){
	  echo "<li id='$id' class='msg'><b><img src=\"$nation.png\" width=\"20px\" height=\"10px\"> Ty:</b><span style='color: #00b300;'> ".$message."</span> $cenzura_but</li>";
   }else{
	  echo "<li id='$id' class='msg'><b><img src=\"$nation.png\" width=\"20px\" height=\"10px\"> $ranga".ucwords($name).":</b>$ranga_color ".$message."$ranga_color_end $cenzura_but</li>";
   }
   
}
?>