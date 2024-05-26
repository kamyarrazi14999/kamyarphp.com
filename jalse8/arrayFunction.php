<form action="" method="post">
 <input type="text">
</form>


<?php

$person= array('kamiyar','razi ', 37,1,'A');
// echo $person[0],' ',$person[1],' ',$person[2];
//Nested array
$persons=[
'1234'=>[ 'kamiyar','razi ', 37,1986],
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

echo "</pre>";

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