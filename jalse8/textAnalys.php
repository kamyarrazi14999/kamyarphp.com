<?php
$text='';
$chers='';
$words='';
$sent='';
$parag=' ';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $text = $_POST['text'];
    $chers =mb_strlen($text);
    $words = str_word_count($text,0,'ابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیآ');
    $sent=count(preg_split('/[?.!؟]\s/',$text,0),PREG_SPLIT_NO_EMPTY);
    $sent--;
    $parag=count(preg_split('/\n\s*/',$text,0 ),PREG_SPLIT_NO_EMPTY);
    
} 
?>
<style>
    body{
width: 800px;
margin: 10px;
background:linear-gradient(359deg, rgb(233, 82, 219), rgb(32, 5, 175));
text-align: center;
direction: rtl;
border-radius: 10px;
} 
textarea{
display:grid;
align-items: center;
direction: rtl;
font-size: 20px;
background:linear-gradient(358deg, rgb(19, 250, 17), rgb(8, 17, 21)); 
color:#fff;
border-radius: 10px;
cursor: pointer;
padding-right: 50px;

}
.submit{
display: flex;
 font-size:20px;  
width: 5rem;
height: 40px;
padding:10px;
text-align: center;
align-items: center;
color: red;
background:linear-gradient(37deg, rgb(136, 90, 238), rgb(4, 21, 33)); 
text-decoration: dotted;
border-radius: 10px;
cursor: pointer;
transform: calc(1.1);
}

.result{
text-align: center;
font-size: 20px;
padding-right: 300px;
}






</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آنالیز متن</title>
</head>
<body>
    <h3>آنالیز متن</h3>
   <div> <form action="textAnalys.php" method="POST"  >
<textarea name="text" id="" rows="15" cols="100"><?php echo $text; ?></textarea> <br> ,<br>
<input class="submit" type="submit" value="آنالیز">
</div>
    </form>
    <div class="result">
    تعداد کارکتر های آنالیز شده :<?php echo $chers; ?> <br> 
    تعداد کل کلمات :<?php echo $words; ?> <br>
    تعداد کل جمله :<?php echo $sent; ?> <br>
    تعداد کل پاراگراف :<?php echo $parag; ?> <br>



    </div>
</body>
</html>