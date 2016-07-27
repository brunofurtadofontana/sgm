<?php
	$con = mysql_connect("localhost","root","")or die(mysql_error());
	$cx = mysql_select_db('materiais',$con)or die(mysql_error());
?>