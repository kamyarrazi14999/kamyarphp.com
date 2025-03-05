<?php
class Employ
{
    private $name;
    public function Setname($name)
    {
        $this->name = $name;
    }
    public function Getname()
    {
        return $this->name;
    }

}
// ارث بری کلاس
class Manager extends Employ{
    public function great(){
       echo "Hello, my name is " . $this->getName() . " and I am a manager.";
        
    }

}
// polymorphism
// بارها م توانیم استفاده کتیم 
class Worker extends Employ
{
    public function great()
    {
       echo "Hello, my name is " . $this->getName() . " and I am a worker.";

    }

}
$manager = new Manager();

$manager->Setname("ali");

$manager->great();

$worker = new Worker();

$worker->Setname("reza");

$worker->great();
?>