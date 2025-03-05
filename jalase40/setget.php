
<?php
class User
{
    private $username;
    // setter method
    public function __SetName ($username){
        $this->username = $username;

    }
    // getter method
    public function __GetName(){
        return $this->username;
    }

}

$user = new User();
$user->__SetName("ali");
echo $user->__GetName(); 
// output: ali
?>