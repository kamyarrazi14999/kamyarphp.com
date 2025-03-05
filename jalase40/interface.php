
<?php
interface camfly
{
    public function fly();

}
 class bird implements camfly{
    public function fly(){
        echo "I cant fly";
    }
// perfo function
 }
class plane implements camfly{
    public function fly(){
        echo "I can fly";
    }
}
class car implements camfly{
    public function fly(){
        echo "I can fly";
    }
}

$bird = new bird();

$bird->fly();
?>