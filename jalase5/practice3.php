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
table, th, td {
  border: 5px solid;}


</style>


<!-- مساحت و محیط مثلث -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>مساحت مثلث</title>
<link rel="stylesheet" href="./sun-anime-1024x1024.jpg">
</head>
<body>
<h1> </h1> 
<div class="card" >
<form  action=" "     method="post">
<label  for="age"> سن کاربر :</label>  
<input  id="age"  type="text" name="age"> <br>
<input  class="cap" type="submit" name="submit" value="محاسبه" >
</form>
</div>
</body>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $age = intval($_POST['age']);
$day= $age * 365;
$moth= $age *12;
$h= $day *24;
$min=$h*60;
$s= $min*60;
if($age ==0){
    echo "   مقدار واقعی وارد کنید";
    }
else{
echo"
    <html>
    <table>
      <tr>
      <th>روز</th>
      <th>ماه</th>
      <th>روز</th>
      <th> ساعت</th>
      <th>ثانیه</th>
      </tr>
      <tr>
      <td>$day </td>
      <td>$moth </td>
      <td>$h </td>
      <td>$min </td>
      <td>$s </td>
      </tr>
      <tr>
     
    
    </table>";

}

}

?>