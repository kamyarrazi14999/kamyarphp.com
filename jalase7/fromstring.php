<?php
$text= '';
if($_SERVER['REQUEST_METHOD']=== 'POST'){

    $text = $_POST['text'];
    
}
?>

<style>
    *{
margin: 0;
padding: 0;
box-sizing: border-box;
}
input{
text-align: center;

}

    .dfd{
        display: grid;
        text-align: center;
        align-items: center;
        color:#008040;
        background:#123;
        margin: 20px;
        direction: rtl;
      
    }
.jam{
    margin: 10px;
background-color: #008040;
direction: rtl;
padding: 10px;
border-radius: 8px;
}
    
h1{
text-align: center;
align-items: center;
font-size: 20px;
font-family: 'Courier New', Courier, monospace;
}
 .bom{
 font: 1em sans-serif;
background-color: yellow;
padding: 8px;
text-align: center;
align-items: center;
direction: rtl;
margin: 10px;
border-radius: 50%;
cursor: pointer;

 }   
 span{
 margin: 10rem;
 margin-bottom: 2rem;
font-size: 20px;
background-color: #008040;
color:#123;
box-shadow: 10px 10px 10px 10px #123;
padding: 20px;

 }
 .bom:hover{
 background-color: red;
 scale: 1.1;

 }


</style>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>form php</title>
        
    </head>
    <body>
        <h1>محاسبه گر متن پردازشگر</h1>
       <div class="dfd"><form action="" method="post">
            <textarea class="jam" name="text" id="" rows="10"  cols="80" ></textarea> <br><br>
            <input  class="jam" name="text2"  type="text"> <br><br>
            <input  class="jam" name="text3"  type="text"> <br><br>
            <input class="bom" name="submit"  type="submit" value="submit" >
        </form>
        </div>   
    </body>
    </html>
    <?php
// $lenght= strlen($text);
// $substr= substr_replace ($text,$_POST['text2'],1,6);
// $num=nl2br($text,$_POST['text3']);
// echo '<br> <br> <br>';
// echo  "<span>تعداد کارکتر متن: $lenght</span>" ;echo' <br><br> <br> <br>';
// echo  "<span> $substr</span>" ;echo' <br><br> <br> <br>';
// echo  "<span> $num</span>" ; echo' <br><br> <br> <br>';
echo nl2br($text); echo '<hr>';
echo strrev($text);echo '<hr>';
$textrev=strrev($text);
if($text == $textrev){
    echo  'this word is pallonderm';
}
else{

    echo  'this word is not pikonderm';
}
?>