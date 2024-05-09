<style>
input{
margin-bottom: 10px;

}

.but{
padding: 15px;
background-color: greenyellow;
color: black;
font-size: 15px;

}
.jaja{
width: 300px;
background-color: #008050;
padding: 20px;
}
</style>


<html>
    <div  class="jaja">
<form action="" method="POST">
    <input type="number " name="number1" ><br>
    <input   type="number " name="number2" ><br>
    <input   class="but"type="submit" name="submit" value="+"  >
    <input  class="but" type="submit" name="submit" value="-"  >
    <input   class="but"type="submit" name="submit" value="*"  >
    <input class="but" type="submit" name="submit" value="/"  >
</div>
</form>

</html>

<?php
if(isset($_POST["submit"])){
$number1 = $_POST["number1"];
$number2 = $_POST["number2"];
// echo  $number1 , $number2;

if($_POST["submit"]== '+'){
    $sum= $number1 + $number2;
    echo $sum;
}

if($_POST["submit"]== '-'){
    $result1= $number1 - $number2;
    echo $result1;
}
if($_POST["submit"]== '*'){
    $product= $number1 *$number2;
    echo $product;
}
if($_POST["submit"]== '/'){
    $result2= $number1 /$number2;
    echo $result2;
}
}
?>