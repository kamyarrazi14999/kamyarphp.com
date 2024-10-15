<?php





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<style>
     body{
        background-color: rgb(219, 211, 211);
        justify-content: center;
        align-items: center;
        height: 100vh;
        display:block;

    }
    .container{
        margin-top: 5%;
        width: 400px;
        height: 400px;
        background-color: #0000ff;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 10px;
        padding: 20px;
        animation-name: sop;
        animation-duration: 3s;
        animation-iteration-count:unset;
    
    }
    @keyframes sop{
        0%{
            transform: perspective(1000px) rotateY(0deg);
        }
        50%{
            transform: perspective(1000px) rotateY(180deg);
        }
        100%{
            transform: perspective(1000px) rotateY(360deg);
        }
      
     }  
    input{
        width: 300px;
        height: 30px;
        border-radius: 10px;
        margin: 5px;
        cursor: pointer;
    }
    h2{
        text-align: center;
        margin: 10px;
        color: white;
        font-size: 20px;
        text-shadow: 0 0 10px rgba(0,0,0,0.5);
        box-shadow: 0 0 20px rgba(0,0,0,0.5);

    }
    input[type="submit"]{
        width: 100px;
        height: 30px;
        border-radius: 50px;
        margin: 5px;
        cursor: pointer;
        
    } 
    
</style>
<body>
    <h2>login form</h2>
</body>
</html>