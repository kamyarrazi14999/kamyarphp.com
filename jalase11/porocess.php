<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $namefamily = $_POST['namefamily'];
    $email = $_POST['email'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $cardNumber = $_POST['cardNumber'];
    $Password = $_POST['Password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
   
    class person{
      public $name;
      public $namefamily;
      public $email;
      public $PhoneNumber;
      public $cardNumber;
      public $Password;
      public $address;
      public $gender;
      public $country;
      public function __construct( $name, $namefamily, $email, $PhoneNumber, $cardNumber, $Password, $address, $gender,  $country){ 
        $this->name = $name;
        $this->namefamily = $namefamily;
        $this->email = $email;
        $this->PhoneNumber = $PhoneNumber;
        $this->cardNumber = $cardNumber;
        $this->Password = $Password;
        $this->address = $address;
        $this->gender = $gender;
        $this->country = $country;

      }

      
    }
    $person = new Person($name, $namefamily, $email, $PhoneNumber, $cardNumber, $Password, $address, $gender, $country);
  echo  "<h2>اطلاعات شما با موفقیت ذخیره شد</h2>"; 
  echo '<hr>';
  echo "Name:".$person->name."<br>";
  echo " Namefamily:".$person->namefamily."<br>";
  echo " Email:".$person->email."<br>";
  echo " PhoneNumber:".$person->PhoneNumber."<br>";
  echo " cardNumber:".$person->cardNumber."<br>";
  echo " Password:".$person->Password."<br>";
  echo " address:".$person->address."<br>";
  echo " gender:".$person->gender. "<br>";
  echo " country:".$person->country."<br>";

} 
else{

    header("location:from.php");
    exit();
}
?>


