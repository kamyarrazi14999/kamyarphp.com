<?php
$user="admin1";
$password="1234";

if($user=="admin" && $password=="1234") {
echo "ادمین گرامی خوش آمدید" ;
} else{
// echo "شما مجاز نیستید";
echo "
<html>
    <h1  style='color:red';>شما اجازه ورود ندارید</h1>
</html>
";

}
if($user !="admin "){
echo "نام کاربری اشتباه است";
}
if($password !=" 1234"){
echo "پسورد اشتباه است";
}
?>