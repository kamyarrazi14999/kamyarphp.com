<style>
@font-face {
font-family: kami;
src: url(./assets/font/BTitr.ttf)
}
*{
margin: 0;
padding: 0;
box-sizing: border-box;
} 
.card{
display: flex;
align-items: center;
text-align: center;
justify-content: center;
margin: 10px;
background-color: blue;
font-family: kami;
cursor: pointer;
direction: rtl;


}
input{
width: 250px;
height: 1rem;
background-color: yellow;
padding: 10px;
text-align: center;
cursor: pointer;

}
input:hover{
background-color:green;
color:black;
width:260px;

}
.cap{

width: 120px;
height: 1rem;
padding: .8rem;
text-align: center;
justify-content: center;
border-radius: 5px;
top: 0;
left: 0;
cursor: pointer;
direction: rtl;
}
.cap:hover{
background-color: red;
width: 150px;
color: #5121de;
}

h1{
align-items: center;
text-align: center;
font-size: larger;
font-family: kami;

}
</style>


<!--  محیط مثلث -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>محیط مثلث</title>
<link rel="stylesheet" href="./sun-anime-1024x1024.jpg">
</head>
<body>
<h1> محیط مثلث</h1> 
<div class="card" >
<form  action=" "     method="post">
<label  for="new1"> ضلع اول:</label>  
<input  id="new1"  type="text" name="new1"> <br>
<label  for="new2">ضلع دوم:</label>  
<input  id="new2"  type="text" name="new2"> <br>
<label  for="new3">ضلع سوم :</label>  
<input  id="new3"  type="text" name="new3"> <br>
<input  class="cap" type="submit" name="submit" value=" محاسبه محیط " >
</form>
</div>
</body>


<?php
if  ($_SERVER['REQUEST_METHOD']=='POST'){
$new1=intval($_POST['new1']);
$new2=intval($_POST['new2']);
$new3=intval( $_POST['new3']);
$sidetotal= $new1 + $new2 + $new3;
if($sidetotal==0){
    echo " <input  type='text' value='مقدار واقعی وارد کنید و به صورت عددی وارد کنید'>";
}else{
echo"<input type='text'   value='محیط مثلث برابر است با:$sidetotal ' >";
}


}




?>
