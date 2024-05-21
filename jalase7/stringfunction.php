
</html>

<?php
$text1="Certain but she but shyness why cottage. Gay the put instrument sir entreaties affronting. Pretended exquisite see cordially the you. Weeks quiet do vexed or whose. Motionless if no to affronting imprudence no precaution. My indulged as disposal strongly attended. Parlors men express had private village man. Discovery moonlight recommend all one not. Indulged to answered prospect it bachelor is he bringing shutters. Pronounce forfeited mr direction oh he dashwoods ye unwilling.

Delightful remarkably mr on announcing themselves entreaties favourable. About to in so terms voice at. Equal an would is found seems of. The particular friendship one sufficient terminated frequently themselves. It more shed went up is roof if loud case. Delay music in lived noise an. Beyond genius really enough passed is up.";


// echo strlen($text);
// var_dump(strlen($text));
echo $text1 ,'<br /> <hr />'; 
echo 'strlen():';
print_r(strlen($text1));
echo '<hr>';
echo 'strpos():';
echo strpos($text1,"is");
echo '<hr>';
echo 'strrpos():';
echo strrpos($text1,"up");
echo '<hr>';
echo 'substr():', substr($text1 ,0,20).'... ' ,' <a href="./stringfunction.php" target="_blank" rel="noopener noreferrer">more </a> 
'; echo '<hr>'  ;
echo 'str-replace():',str_replace('To',' To',$text1);echo '<hr>';
echo 'str-ireplace():',str_ireplace('to',' To',$text1);echo '<hr>';
echo  'strtoupper():' . strtoupper($text1) , '<hr>'  ;
echo  'strtolower():' . strtolower($text1) , '<hr>'  ;
echo  'ucfirst():' . ucfirst(strtolower($text1)) , '<hr>'  ;
echo  'ucwords():' . ucwords(($text1)) , '<hr> '  ;
$text2= " wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath  ";


var_dump($text2);echo ' <br> <hr>';
var_dump(trim($text2));echo "<hr>";
$name= "kamiyar";
$fam="Razi";
echo $name.$fam ;echo' <hr>' ; 
$textArray= explode(".",$text2);
// print_r($textArray);
var_dump($textArray);
?>