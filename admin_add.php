<?php

?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #2ab934;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
  
  
  input:checked+ .slider2 .on
{display: block;}

input:checked + .slider2 .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider2.round {
  border-radius: 34px;
}

.slider2.round:before {
  border-radius: 50%;}
  
  .slider2 {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ff0000;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider2:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider2 {
  background-color: #00ff00;
}

input:focus + .slider2 {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider2:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}


#rotate{
  vertical-align:top;
  margin-top:23px;
  width:80px;height:30px;
  transform:rotate(7deg);
  -ms-transform:rotate(90deg); /* IE 9 */
  -moz-transform:rotate(90deg); /* Firefox */
  -webkit-transform:rotate(270deg); /* Safari and Chrome */
  -o-transform:rotate(90deg); /* Opera */}
</style>
		 <style>

.center {
 margin-right: 40%;
  margin-left: 40%;
}

</style>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<style>
/* DivTable.com */
.divTable{
	display: table;
	width: 100%;
	  margin-left: -50%;
}
.divTableRow {
	display: table-row;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	border: 1px solid #999999;
	display: table-cell;
	padding: 3px 10px;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}
</style>
<br><br>
<div class="center">

	<form action="" method="POST" name="admine">
	<center>
	Dyscyplina: <select name="disc" id="disc">
<option value="" disabled="" selected="" style="display:none;">Wybierz dyscyplinę...</option>
<option value="skoki">SKOKI</option>
<option value="biegi">BIEGI</option>
<option value="alpejskie">ALPEJSKIE</option>
<option value="biathlon">BIATHLON</option>
<option value="kombinacja">KOMBINACJA</option>
</select><br><br>

<label class="switch">
<input type="checkbox" name="plec"><div class="slider round">
<!--ADDED HTML -->
<span class="on">Woman</span><span class="off">Man</span>
<!--END--></div>
</label>
	<br>
	Nazwa zawodów:<br> <input type="name" name="name" style="width: 300px;"><br>
	Data  zawodów:<br> <input type="date" name="data" style="width: 300px;"><br>
	Godzina zawodów:<br> <input type="time" name="godz" style="width: 300px;"><br>
	Zdjęcie skoczni/trasy:<br> <input type="name" name="image" placeholder="URL zdjęcia" style="width: 300px;"><br>
	Lista konkursowa:<br> <input type="name" name="lista" placeholder="URL listy startowej FIS" style="width: 300px;">
	<br>Opis zawodów:<br>
	<textarea name="opis" cols="80" rows="10" id="opis" style="width: 450px;"></textarea><br>
	<br>
	Dodatki:
	<br>
	
	<div class="divTable">
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell"><table class="tg">
  <tr>
    <th class="tg-0pky" colspan="2"><center>PŚ w Lotach</center></th>
  </tr>
  <tr>
    <td class="tg-0lax">ON<br><br><br>OFF</td>
    <td class="tg-0lax"><label class="switch"  id="rotate">
<input type="checkbox" name="pswl" ><div class="slider2 round">
</div>
</label></td>
  </tr>
</table></div>


<div class="divTableCell"><table class="tg">
  <tr>
    <th class="tg-0pky" colspan="2"><center>Czterolistna</center></th>
  </tr>
  <tr>
    <td class="tg-0lax">ON<br><br><br>OFF</td>
    <td class="tg-0lax"><label class="switch"  id="rotate">
<input type="checkbox" name="czterolistna"><div class="slider2 round">
</div>
</label></td>
  </tr>
</table></div>


<div class="divTableCell"><table class="tg">
  <tr>
    <th class="tg-0pky" colspan="2"><center>TCS</center></th>
  </tr>
  <tr>
    <td class="tg-0lax">ON<br><br><br>OFF</td>
    <td class="tg-0lax"><label class="switch"  id="rotate">
<input type="checkbox" name="tcs"><div class="slider2 round">
</div>
</label></td>
  </tr>
</table></div>


<div class="divTableCell"><table class="tg">
  <tr>
    <th class="tg-0pky" colspan="2"><center>Raw Air</center></th>
  </tr>
  <tr>
    <td class="tg-0lax">ON<br><br><br>OFF</td>
    <td class="tg-0lax"><label class="switch"  id="rotate">
<input type="checkbox" name="rawair"><div class="slider2 round">
</div>
</label></td>
  </tr>
</table></div>

<div class="divTableCell" style="background-color:#d3d3d3;"><table class="tg">
  <tr>
    <th class="tg-0pky" colspan="2"><center><b>Drużynowy</center></th>
  </tr>
  <tr>
    <td class="tg-0lax">ON<br><br><br>OFF</td>
    <td class="tg-0lax"><label class="switch"  id="rotate">
<input type="checkbox" name="druzynka"><div class="slider2 round">
</div>
</label></td>
  </tr>
</table></div>

</div>
</div>
</div>
	




	<br><br>
	<input type="submit" value="Wyślij" name="tak_lis">
	</form>

	</div>