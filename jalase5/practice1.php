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
width: 200px;
height: 1rem;
background-color: yellow;
padding: 10px;
text-align: center;
cursor: pointer;

}
input:hover{
background-color:green;
color:black;
width:250px;

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
color: blue;
}

h1{
align-items: center;
text-align: center;
font-size: larger;
font-family: kami;

}
</style>


<!--  فرم محیط و مساحت مربع-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>محیط مربع</title>
<link rel="stylesheet" href="./sun-anime-1024x1024.jpg">
</head>
<body>
<h1> محیط  و مساحت مربع</h1> 
<div class="card" >
<form  action=" "     method="post">
<label  for="num"> ضلع مربع را وارد کنید :</label>  
<input  id="num"  type="text" name="num"> <br>
<input  class="cap" type="submit" name="submit" value="  مساحت و محیط مربع" >
</form>
</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$num =intval($_POST["num"]);
// var_dump($num);
if($num ==0){
echo "   مقدار واقعی وارد کنید و به صورت عددی وارد کنید";
}


// if ($num==null){
//   echo "عدد وارد کنید";
// }
$res1=$num * $num;
echo 
"<input type='text'   value='مساحت مربع برابر است با:$res1 '  >";
$res2 = $num * 4;
echo
"<input type='text'   value='محیط مربع برابر است با:$res2  '  >";
}




?>