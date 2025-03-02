
<?php
class Person {
    public $name;
    protected $age;
    private $password;

    public function __construct($name, $age, $password) {
        $this->name = $name;
        $this->age = $age;
        $this->password = $password;

    }
    public function __displayInfo() {
        echo "name: ".$this->name."<br>";
        echo "age: ".$this->age."<br>";
      
    }
}

$person = new Person("ali",20,"123");

$person->__displayInfo();

?>