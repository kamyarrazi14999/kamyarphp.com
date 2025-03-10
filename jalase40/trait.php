<?php
trait log{
    public function log(){
        echo "log";
    }
}

class User {
    use log;
}
// uml 
// زبان مدل ساز ی است که می توانند در شی گرا استفاده شود 
?>