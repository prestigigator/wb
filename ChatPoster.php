<?php

   $db = new PDO('mysql:host=HOST;dbname=DBF','DBLG','PASS');
   $time_now = time();
   if(isset($_POST['text_chat']) && isset($_POST['user_name'])) {

      $text = htmlspecialchars($_POST['text_chat']);
      $name =  htmlspecialchars($_POST['user_name']);
	  $user_id = htmlspecialchars($_POST['user_id']);
	  
      if(!empty($text) && !empty($name)) {
         $query = "INSERT INTO messages VALUES('', '".$user_id."', '".$name."', '".$text."', '".$time_now."')";

		 $db->query($query);
         echo "<li class='msg'><b>".ucwords($name).":</b> ".$text."</li>";
      }
   }

 ?>