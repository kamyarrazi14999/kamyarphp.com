
</html>
<a href="./stringfunction.php" target="_blank" rel="noopener noreferrer"></a>
<?php
$text="Certain but she but shyness why cottage. Gay the put instrument sir entreaties affronting. Pretended exquisite see cordially the you. Weeks quiet do vexed or whose. Motionless if no to affronting imprudence no precaution. My indulged as disposal strongly attended. Parlors men express had private village man. Discovery moonlight recommend all one not. Indulged to answered prospect it bachelor is he bringing shutters. Pronounce forfeited mr direction oh he dashwoods ye unwilling.

Delightful remarkably mr on announcing themselves entreaties favourable. About to in so terms voice at. Equal an would is found seems of. The particular friendship one sufficient terminated frequently themselves. It more shed went up is roof if loud case. Delay music in lived noise an. Beyond genius really enough passed is up.";


// echo strlen($text);
// var_dump(strlen($text));
echo $text ,'<br /> <hr />'; 
echo 'strlen():';
print_r(strlen($text));
echo '<hr>';
echo 'strpos():';
echo strpos($text,"is");
echo '<hr>';
echo 'strrpos():';
echo strrpos($text,"up");
echo '<hr>';
echo 'substr():', substr($text ,0,20).'... ' ,' <a href="./stringfunction.php" target="_blank" rel="noopener noreferrer">more </a> 
'; echo '<hr>'  ;
echo 'str-replace():',str_replace('To',' To',$text);echo '<hr>';
echo 'str-ireplace():',str_ireplace('to',' To',$text);echo '<hr>';
?>