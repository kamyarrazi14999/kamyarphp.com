<?php
if(isset($_GET['file'])) {
   $old_name ='./uploads/' .$_GET['file'];
   // var_dump($old_name) .'<br>';
   // مسیر اصلی را به پرنت وارد می کنیم
   $prant_dir=isset($_GET['dir']) ? $_GET['dir'] : '';
   if(isset ($_POST['new_name'])) {
      $new_name='./uploads/' .$_POST['new_name'];
      // rename($old_name, $new_name);
      if(rename($old_name,$new_name)) {
      //   $redirect= 'index.php?dir='.$prant_dir.'&msg=File Renamed Successfully!';
      //    header('location:'.$redirect );
    $redirect = 'index.php'.($parent_dir ? '?dir='.$parent_dir : '');
            header("Location:$redirect");
   }
     else {
       echo 'Error rename the file. Please try again'.$new_name ;
      }
   } 

} else {
header("location:index.php");
exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rename File</title>
   <style>
 .container{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 18px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    animation-duration: 3s;
    animation-name: slidein;
    animation-fill-mode: forwards;
    /* animation-iteration-count: infinite; */
    border-radius: 8px;

}

@keyframes slidein {
   0% {opacity: 0; transform: translateY(-100%);}
   100% {opacity: 1; transform: translateY(0);}
}

.container{
   max-width: 500px;
   margin: 0 auto;
}

button{
   padding: 10px 20px;
   border: 1px solid #ccc;
   background-color: #fff;
   font-size: 18px;
   cursor: pointer;
   border-radius: 8px;
}

input[type=text]{
   padding: 10px;
   border: 1px solid #ccc;
   margin-bottom: 10px;
   font-size: 18px;
   border-radius: 8px;
}

@media screen and (max-width: 600px){
   input[type=text]{
      width: 90%;
   }

   button{
      width: 100%;
   }

}
@media screen and (max-width: 400px){
   .container{
      font-size: 16px;
   }
   
}




   </style>
</head>
<body>
   <div class="container">
   <h1>Rename File</h1>
   <form action="" method="post">
      <input type="text" name="new_name" value="<?php echo htmlspecialchars($_GET['file']); ?>">
      <button type=submit>Rename</button>
   </form>
   </div>
</body>
</html>