<?php
session_start();
// echo '<pre>';
// var_dump($_SESSION['cart']);
// echo '</pre>';
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
h1{
    font-size: 30px;
    text-align: center;
    color: green;
   margin-top: 100px;
   text-align: center;
    margin: 0 auto;
    cursor: pointer;
    animation-name: kam;
    animation-delay: 3s;
    animation-duration:0ms;

}
a{
    text-decoration: none;
    padding: 10px 20px;
    background-color: blue;
    color: white;
    border-radius: 5px;
    text-align: center;
    margin: 0 auto;
    cursor: pointer;
}
a:hover{
    background-color: red;
    color: white;
    transition: background-color 0.3s ease
    
}
@keyframes kam{
    0%{
        transform: translateX(0px);
    }
    100%{
        transform: translateX(100px);
    }
    
}


</style>
<body>
    <h1 id=fad>Your Shopping Cart is Empty</h1>
    <a href="shope.php">Go to Shop</a>
    <script>
        document.getElementById('fad').addEventListener('animationend', function(){
            window.location.href = 'shope.php';
        })
      


    </script>
    
</body>
</html>