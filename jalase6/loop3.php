<html>
<form action=""  method="post" >
<input type="text"  name="num"  >
<input type="submit"  name="submit" value="جسجو کن"   >
</form>
</html>

<?php
$person =array('ali' , 'tagi','kami','mohamad','farid');

// for ($i=0; $i <=3 ; $i++) { 
// // echo $n;
// echo "Hello $person[$i] <hr> ";
// }
if($_SERVER['REQUEST_METHOD'] =='POST'){
    echo "<h1>نتیجه جستجو</h1> <br> ";
    for ($i=0; $i <= intval($_POST['num']-1) ; $i++) { 
        // echo $n;
        echo "Hello $person[$i] <hr> ";
        }


      }
   
  
// echo "<h1>foreach</h1> <br> ";
// foreach($person as $value){
// echo "Hello $value <hr> ";


// }

?>