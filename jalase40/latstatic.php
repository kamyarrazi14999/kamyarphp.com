<?php

class Parantclass{
    protected static $name = "Parent";
    public static function getName(){
        return static::$name;
    }

}
// late static binding :

class chidechild extends Parantclass{
protected static $name = "Child";
}

echo Parantclass::getName(); // Parent

echo chidechild::getName(); // Child
?>