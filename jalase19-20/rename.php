<?php
if(isset($_GET['file'])) {
   $old_name ='./uploads/' .$_GET['file'];
}
echo var_dump($old_name);


?>