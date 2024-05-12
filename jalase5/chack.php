<style>
@font-face {
    font-family:kami ;
    src: url(./assets/font/Vazir.ttf);
}


*{
margin: none;
padding: none;
box-sizing: border-box;
}

.conitiner{
font-family: kami;
display: flex;
text-align: center;
align-items: center;
justify-content: center;
margin: 10px;
width: 1300px;
height: .7erm;
padding: 10px;
color: blue;
background-color: red;
direction: ltr;

}
h1{
display: flex; 
margin: 1rem;   
text-align: center;
justify-content: center;

direction: ltr;
top: -0;

}
input{
color: #000;
background-color: yellow;

}



</style>








<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
</head>
<body>
    <h1>   ترجمه فارسی </h1>
<div class="conitiner">
    <form action=""  method="post" >
<label for="  ">  ترجمه </label>
<input type="text" name="word" > <br /> <br>
<input type="submit" value="ترجمه انگلیسی به فارسی" >

<!-- <img src="" alt="./assets/img/How to write a book.jpg"> -->


  </form>

</div>
</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD'] =='POST'){

$word = $_POST['word'] ;



switch($word){
case 'word':  echo  "  جهان <img src='./assets/img/download.jpeg' alt='word'>";
    break;
    case 'apple':  echo  "  سیب<img src='./assets/img/apple.jpeg' alt='word'>";
    break;
    case 'book':  echo  "  کتاب<img src='./assets/img/How to write a book.jpg' alt='word'>";
    break;
default: echo "کلمه شما در دیکشنری وجود ندارد";


}






}



?>