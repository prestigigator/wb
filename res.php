<?include('header.php');

$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

$rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tc_sk WHERE cat_id = 'psm' ORDER BY `id` DESC"));



$zawodyid=$rows['id'];
//$zawodyID=$rows['zawid'];///temp


		
#pomocniczaID#
$sql2a="SELECT `ussid` FROM `tt_sk` WHERE `zawid` = '$zawodyid' ORDER BY `ussid` ASC";
$result2a=mysqli_query($conn,$sql2a);
	

	
$listaskoczkow0 = explode("+", $rows['results']);


$bigArray=array_flip($listaskoczkow0);



$sql2d="SELECT  `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10` FROM `tt_sk` WHERE `zawid` = '$zawodyid' ORDER BY `ussid` ASC";
$result2d=mysqli_query($conn, $sql2d);

$lele = 8;














if(isset($_POST['duplikaty'])){
mysqli_query($conn, "DELETE n1 FROM tt_sk n1, tt_sk n2 WHERE n1.id > n2.id AND n1.zawid = n2.zawid AND n1.ussid = n2.ussid")
or die ('Podczas wysyłania wystąpił błąd!');

}




if(isset($_POST['podlicz'])){ #sprawdzanie czy formularz wysłany#

while($rows2 = mysqli_fetch_assoc($result2d)){
		
$rows2a = mysqli_fetch_assoc($result2a); #tbl-users#
$editvalue = mysqli_fetch_assoc($resultedit);

$smallArray = array_flip($rows2);
$sum = 0;

$iduser0=$rows2a['ussid']; #define ID


foreach($bigArray as $bigKey=>$bigValue){
    foreach($smallArray as $smallKey=>$smallValue){
        if($smallKey==$bigKey){
		
           $output=abs($bigValue-$smallValue);
		   $sum+= $output;
		   $sumawlasciwa = 100 - $sum;
		   
		  
		   
		    if($sumawlasciwa < 0){
				$sumawlasciwa = 0;
				//echo 'For '.$bigKey.' difference is '.$output.'<br><br>';
				 
			}else{
			//	echo 'For '.$bigKey.' difference is '.$output.'<br><br>';
			
			}
        }
    }
}

mysqli_query($conn,"UPDATE `ranks_sk` SET `skoki_psm_o`='$sumawlasciwa' WHERE `ussid` = '$iduser0'")
				 or die ('Podczas wysyłania wystąpił błąd!'); 
				
   $msg_0 .= "Wczytano punkty za typy dla gracza ID $iduser0<br>";

}
echo $msg_0;
}





if(isset($_POST['dodaj_wyniki'])){
	
mysqli_query($conn,"SET @rank=1;");
$teee = mysqli_query($conn, "SELECT @rank:=@rank+1 AS `rank`, `ussid`, `skoki_psm_o`, `data_psm` FROM `ranks_sk` WHERE `skoki_psm_o` > 0 ORDER BY `skoki_psm_o` DESC, `data_psm` ASC");

while($rows5555 = mysqli_fetch_assoc($teee)){


	$ttt = "UPDATE `ranks_sk` SET `joined_psm`='".$rows5555['rank']."' WHERE `ussid` = '".$rows5555['ussid']."'";
	mysqli_query($conn, $ttt);		
	
}
echo $msg = "Ostateczne wyniki konkursu podliczone i umieszczone w rankingu!";
}



if(isset($_POST['generalka'])){
	$tt1 = "UPDATE `ranks_sk` SET `skoki_psm`=`skoki_psm`+`skoki_psm_o`";
	mysqli_query($conn, $tt1);
	echo $msg = "Generalka chyba wczytana";
}else{
	//
}


if(isset($_POST['zerowanie'])){
	$tt1 = "UPDATE `ranks_sk` SET `skoki_psm_o`=0, `joined_psm`=0";
	mysqli_query($conn, $tt1);
	echo $msg = "wyzerowane";
}else{
	//
}

?>
<script src="jquery-3.3.1.min.js"></script>

<form action="" method="POST" name="zerowanie">
	<input type="hidden" name="zawodzik" value="<? echo $rows['zawid']; ?>">
	0. <input type="submit" name="zerowanie" value="zeruj dane">
	</form><br>
	
	<form action="" method="POST" name="duplikaty">
	<input type="hidden" name="zawodzik" value="<? echo $rows['zawid']; ?>">
	1. <input type="submit" name="duplikaty" value="Usuń duplikaty">
	</form><br>

	<form action="" method="POST" name="podlicz">
	<input type="hidden" name="zawodzik" value="<? echo $rows['zawid']; ?>">
	2. <input type="submit" name="podlicz" value="Podlicz punkty z konkursu">
	</form>
	<br>
	
	<form action="" method="POST" name="podlicz_o">
	<input type="hidden" name="zawodzik" value="<? echo $rows['zawid']; ?>">
	3. <input type="submit" name="dodaj_wyniki" value="Podlicz ostateczne wyniki konkursu">
	</form>
	<br>
	
	<form action="" method="POST" name="ranking">
	<input type="hidden" name="zawodzik" value="<? echo $rows['zawid']; ?>">
	4. <input type="submit" name="generalka" value="Uzupełnij generalkę">
	</form>
