
<?php
class Person {
   public $name;
   public $age;
// تابع سازنده
public function __construct($name,$age) {
    $this->name = $name;
    $this->age = $age;
}
// تابع نمایش
public function __displayInfo() {
    echo "name: ".$this->name."<br>";
    echo "age: ".$this->age."<br>";
}

}

$person = new Person("ali",20);

$person->__displayInfo();
$person = new Person("reza",44+2);
$person->__displayInfo();


?>