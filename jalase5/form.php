<style>
*{
margin: 0;
padding: 0;
box-sizing: border-box;
}


.container{
    margin: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    width: 100vw;
    background-color: aqua;




}
.form{
display:flex;
width: 20%;
height: 100%;
padding: 1rem;
text-align: center;
justify-content: center;
align-items: center;
flex-direction: column;
text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
padding: 3rem;
margin: 1rem;
border-radius: 10px;
top: 0;
left: 0;
color: #e60;
background-color: #fff;
font: 1em sans-serif;
font-size: 1rem;
cursor: pointer;

}
.btn{
margin: 1rem;
width: 100px;
height: 2rem;
color: #e60073;
background-color: green;
border-radius: 10px;
cursor: pointer;
}

input{
margin: 1rem;
padding: 10px;
border-radius: 10px;
color-scheme: light;
cursor: pointer;

}
a{
    text-decoration: none;
}

    </style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>form</title>
        <link rel="icon" href="./sun-anime-1024x1024.jpg">
    </head>
    <body>
        
        <div class="container">  <div  class="form">  
            <form action="form.php" method="POST">
            <label for="farstname">FirstName</label>
            <br>
        <input type="text" name="FirstName" placeholder="Enter your name">
        
            <label for="name">LastName</label>
            <br>
        <input type="text" name="LastName" placeholder="Enter your name">
        <input type="password" name="password" placeholder="Enter your name">

        <input class="btn" name="submit"  type="submit" value="login"> <br>
        <a href="http://" target="_blank" rel="noopener noreferrer">Forget Password </a>
        </form>
        </div>
        </div>
        
    </body>
    </html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST['submit'])) {


    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $password = $_POST['password'];
    // echo "فرم با موفقیت ارسال شد";
// echo $firstname , $lastname , $password;
if ($firstname =='admin' && $password=='1234'){
echo "$firstname عزیز خوش آمدید" ;


}


}


if ($_SERVER['REQUEST_METHOD'] == 'GET'&& isset($_GET ['submit'])) {
echo "  لطفا از متد post  استفاده کنید  ";


}

?>