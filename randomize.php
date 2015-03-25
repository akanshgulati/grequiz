<?php
$db = new mysqli('localhost', 'root', '', 'gre');
$list=$_GET['list'];
$total_num=$_GET['total_num'];
$rand_val=rand(1,$total_num);
$sql="Select * from ".$list." where id=".$rand_val;
$result= $db->query($sql);
$row= $result->fetch_assoc();
echo $row["word"]." ".$row["group"];