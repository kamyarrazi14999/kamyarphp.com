<?php 
$x= 51;
$y= 5;
echo "x=".$x;
echo "<br>";
echo "y=".$y;
echo "<hr>";
// $z= $x + $y;
echo "x + y =".$x+$y;
echo "<br>";
echo "x - y = ".$x-$y;
echo "<br>";
echo "x / y = ".$x / $y; 
echo "<br>";
echo "x * y = ".$x * $y;
echo "<br>";
echo "x ** y = ".$x ** $y;
echo "<br>";
echo "x % y = ".$x % $y;
echo "<br>";
echo 3+5*2;//false 
echo "<br>";
echo (3+5)*2;//true
// $x=$x+1;
$x+=5; 
$x*=5; 
echo "<br>";
echo "x=",$x;
echo "<br>";
echo "x + y =".$x+$y;
echo "<br>";
echo "x * y = ".$x*$y;
echo "<br>";
 var_dump("x==:y".$x==$y);//false 
echo "<br>";
var_dump("x<y".$x<$y);
echo "<br>";
var_dump("x>y".$x>$y);
echo "<br>";
$x=50;//integer
$y=50;//integer
$z="50";//string
echo "<hr>";
var_dump("x==y", $x==$y); //true
echo "<br>";
var_dump("x<=y" , $x>=$y);//true 
echo "<br>"; 
var_dump("x>=y", $x<=$y); //true
echo "<br>";
var_dump("x>y" , $x>$y); //false
echo "<br>";
var_dump("x<y" . $x<$y); // false
echo "<br>";
var_dump("z==y" , $z==$y);//true
echo "<br>";
var_dump("x!=y", $x != $y); // false
echo "<br>";
var_dump("x!==y", $x !== $y); // false
echo "<br>";
var_dump("z!==y" , $z!==$y);//true
?>