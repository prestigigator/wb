<?
$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

$sql="SELECT * FROM `tc_sk` WHERE `cat_id`='psm' ORDER BY `id` DESC";
$result=mysqli_query($conn, $sql);
$rows=mysqli_fetch_array($result);
$zawodyID = $rows['id'];


$sql77="SELECT * FROM `tt_sk` WHERE `zawid`='$zawodyID'";
$result77=mysqli_query($conn, $sql77);
$liczbagraczy = mysqli_num_rows($result77);


$sql9766="select x, count(*) from (
    select `1` as x from tt_sk WHERE `zawid`='$zawodyID' union all
	select `2` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `3` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `4` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `5` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `6` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `7` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `8` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `9` as x from tt_sk WHERE `zawid`='$zawodyID' union all
    select `10` as x from tt_sk WHERE `zawid`='$zawodyID'
    ) d
group by x ORDER BY count(*) DESC";
$result9766=mysqli_query($conn, $sql9766);
$result97661=mysqli_query($conn, $sql9766);




//round($fert,3)


?> <center>
<table border=1 style="color: #brown;" width="50%">
<thead>
<tr><td>Lp.</td><td><b style="color: brown;"><center>NAZWISKO Imię</td><td><b style="color: brown;"><center>%</td></tr></thead>
<tbody>
<?
while($lpp<10){ 
$lpp++;
error_reporting(0);
  $data = mysqli_fetch_assoc($result9766);
$fert=$data['count(*)']/$liczbagraczy;
    echo "<tr>";
	echo "<td>$lpp</td>";
	echo "<td><center>".$data['x']."</td>";
    echo "<td><center>".round((float)$fert * 100)."%</td>";
	echo "</tr>";

}
?>

<script type="text/javascript">
var selectFunction = function() {
<?
while($lpp12<10){ 
$lpp12++;
error_reporting(0);
$data1 = mysqli_fetch_assoc($result97661);
?>
document.getElementById("<?echo $lpp12?>").value = "<?php echo $data1['x']; ?>";
<?}?>
};
</script>
</tbody>
<input type="button" value="SZYBKI WYBÓR" onclick="selectFunction()" />
</table>

