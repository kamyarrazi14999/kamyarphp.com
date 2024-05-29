<form action="" method="post">
 <input type="text" name="text">
 <input type="submit">
</form>


<?php

$person= array('kamiyar','Razi', 37,1,'A');
$person2= array('razi',37,'A');
$price = array(1000,2500,1200,4030,500,700);
// echo $person[0],' ',$person[1],' ',$person[2];
//Nested array
$persons=[
'1234'=>[ 'kamiyar','razi',37,1986],
'1238'=>['mani','nima',33,1984],
'1224'=>['sara','karmi',32,1985],
'1245'=>['Mahan','roya',32,1985],
];
// echo '<hr>';
// echo $persons['1234'][3];
// echo '<hr>';
// print_r($persons['1234'][2]);
// echo '<hr>';
// var_dump($persons['1234'][1]);
echo "<pre>";

// print_r($persons);
// اضافه کردن عناصر به انتهای ارایه
// $resuit= array_push($persons[1234], 'Usa');
// print_r($persons);
//
//  foreach ($persons as $key => $value) {
//     $resuit= array_push($persons[$key], 'Usa' ,195);
//      if ($value <0)continue;
//
// print_r($persons);}
//خود ارایه اصلی
// print_r($person);
// $resuit=array_push($person,1981,'Usa');
// print_r($person);
// //کم کردن عناصر از انتها
// $resuit=array_pop($person);
// print_r($person);
// // اضافه کردن به ابتدای ارایه
// $resuit=array_unshift($person,'mohamad');
// print_r($person);
// // حذف از ابتدای ارایه
// $resuit= array_shift($person);
// print_r($person);
// مرتب کردن ارایه
//? حلقه برای نظم و بی نظمی
// foreach ($persons as $key => $value){

// if ($value <5)continue;
// $resuit = sort($persons[$key]);


// print_r($persons[$key]);
// echo '<hr>';
// $resuit1 = rsort($persons[$key]);

// print_r($persons[$key]);
// }
// $resuit=asort($persons);
// print_r($persons);
//  (sort($persons['1224']));
//  print_r($persons);
// ksort($persons);
// print_r($persons);
// looding array
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
// $name = $_POST['text'];

// $resuit = in_array($name, $person);
// // print_r($resuit);
// if($resuit){
    
//     echo 'نام کاربرری از قبل موجود است ';
//     echo '<br/>';
//     print_r($person);
// }
// else{

// array_unshift($person, $name);

// echo 'نام کاربرری ساخته شد';

// print_r($person);
// }


// echo "</pre>";

//search array
// }
// $resuit = array_search('razi', $person);
//count array
// $resuit = count($person);
// print_r($resuit);
// slice array تعداد و برش
// $resuit= array_slice($person,1,count($person));
// echo '<pre>';
// print_r($resuit);
// echo'<br>';
// print_r($person);
// echo'<br>';
// //merge array merged array
// $haha=array_merge($person,$persons['1234']);
// print_r($haha);
//کلید ارایه نشان می دهد
// $resuit = array_keys($person);
// print_r($resuit);
// $resuit = array_keys($persons);
// print_r($resuit);
//مقادیر ارایه نشان می دهد
// $resuit = array_values($person);
// print_r($resuit);
// $resuit = array_values($persons);
// print_r($resuit);
// array_diff مقایسه دو ارایه در ضمینه تعداد ارایه 
// $resuit = array_diff($person,$person2);
// print_r($resuit);
// print_r($person);
// // print_r($person2);
//ارایه های مورد نظر را می توانیم فیلتر و محدود کنیم
// print_r($price);
// $resuit= array_filter($price ,function($value){
//    if($value>2000 && $value<4000){
       
//        echo '<br>',$value;
//    }
// });
print_r($person);
print_r(array_map('strtolower',$person));
print_r(array_map('strtoupper',$person));

echo '</pre>';
// print_r($resuit);
// $resuit = in_array('kamiyar', $person);
// // print_r($resuit);
// if($resuit==1){
    
//     echo 'نام کاربرری از قبل موجود است ';
//     echo '<br/>';
//     print_r($person);
// }
// else{
// echo 'مقدار درخواست شده موجود نیست';


// }


// echo "</pre>";

// // echo $person[0],'',$person[1],'',$person[2];
// // echo $persons['123456789'][0];
// // echo '<hr>';
// // echo var_dump($persons  ['123456789'][3]);
// // $resuit= array_push($person, 'ali');
// echo
// // echo var_dump($persons);
// "<pre>";
// // sort($persons);
// // print_r($persons);
// $resuit=in_array('kamyar',$persons);
// // print_r($resuit);
// if($persons==1){
//     echo ''
// echo '<br/>';
// }
// "</pre>";
// if(($_SERVER["REQUEST_METHOD"])=="POST"){
//     echo $_POST["name"];
// }

?>