<?php
$a = "水电费卡到了疯狂abc123";
$strpos = mb_strrpos($a, "abc123");
echo $strpos;
echo "<br>";
echo mb_strlen($a);
echo "<br>";
echo mb_strlen("abc123");