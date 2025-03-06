
<?php

// clone php

class Parantclass {
    public $name = "Parent";
    public function __clone() {
        echo "Clone object created";
     
    }
}

$parent = new Parantclass();
$child = clone $parent;

?>



