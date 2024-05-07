<style>
h1{
color: #e71e18;
padding: 1rem;
margin: 2%;
font-size: large;
font: 500 sans-serif;
}


</style>



<?php
$number1=2;
if($number1%2===0){
echo "<h1>$number1 is even </h1>";
}
else{
 echo "<h1>$number1 is odd </h1>";
};
echo "<hr>";
$number2=3;
$number3=3;
$number4=3;
echo "numbear2:",  $number2, ' <br>',  "number3:", $number3, ' <br>', "number4:",$number4;
echo "<br>";
$sum = $number2 + $number3 +$number4;
$min= $number2-$number3-$number4;  
$multi = $number2 *$number3 *$number4;  
echo "Sume:+ ",$sum  , "<br>";
echo "Min:+ ",$min , "<br >"; 
echo "Multi:+ ",$multi , "<br >";
echo "<hr>";
$number5 = 2;
$number6 = 4;
$result = $number5 ** $number6 ;
echo "numbers: ",$number5,' ^' , $number6 ,'<br>';
echo "result:" , $result;
echo "<hr>";
$number7 = 10;
$number8 = 12;
$number9 =14;
$avg= ($number7 + $number8 + $number9) / 3;
echo "Average Number.$number7 and $number8 and $number9=$avg"; 
echo "<hr>";
$sidesg = 4;
$sgrper = $sidesg *4;
echo "square premter is:"," ", $sgrper;
echo "<hr>";
$sidetri1=4;
$sidetri2=7;
$sideter13=9;

$triangle = $sidetri1 + $sidetri2 + $sideter13;
echo"Triangle: $triangle"; 

?>