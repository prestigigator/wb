<?
$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

$zawody = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tc_sk WHERE cat_id = 'psm' ORDER BY `id` DESC"));

$lista = $zawody['lista'];
$zawodzik_id = $zawody['id'];

require('simple_html_dom.php');
$html = file_get_html($lista);

$pt = $html->find("div[class=g-lg-6 g-md-6 g-sm-5 g-xs-11 justify-left bold]");

foreach($pt as $value){

$remove= $value->plaintext; 

$test = trim(preg_replace('/\t+/', '', $remove));


if ($value === end($pt)) {
	
     $tooo .= $test;
		
    }else{

  $tooo .= $test."+";
  
	}
}

$test1 = 'null+'.$tooo;
mysqli_query($conn, "UPDATE `tc_sk` SET `results`='$test1' WHERE `id` = '$zawodzik_id'")

or die ('Podczas wysyłania wystąpił błąd!'); 



if($test1== 'null+'){
	
	echo "Nie ma jeszcze wyników FIS! Spróbuj ponownie za chwilę.";
	
}else{
	
echo "Wczytano wyniki FIS => ".$test1;

}

$listaskoczkow0 = explode("+", $rows['wyniki']);
$bigArray=array_flip($listaskoczkow0);

?>