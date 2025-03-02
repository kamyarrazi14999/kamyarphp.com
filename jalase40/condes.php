
<?php
class MYClass{
    
    public function __construct() {
        echo 'Hello from MYClass construct';
    }
    public function __desturuct(){
        echo 'Goodbye from MYClass destruct';

    }
}

$obj = new MYClass();
unset($obj);



?>