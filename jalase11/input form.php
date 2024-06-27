<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  *{
margin: 0;
padding: 0;
box-sizing: border-box;
  }
.container {
  margin-top:1rem;
  display: block;
  background-color: #0C1527;
  text-align: center;
  align-items: center;
  justify-content: center;
  margin: 2rem;
  position: relative;
  margin-bottom: 1rem;
  
}

input[type="text"], input[type="email"]{
  border: 1px solid #FF9E03;
  background-color: #149EF2;
  color: #004000;
  font-weight: bold;
  font-size: 16px;
  border-radius: 10px;
  margin-top: 1rem;
  margin-right: 1px;
  padding: 10px 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-weight: 100;
  text-align: center;
  transform: 3s cubic-bezier(0.075, 0.82, 0.165, 1);
  caret-color: #ffff00;
  cursor: pointer;
  direction:RTL

}
input:hover {
  background-color: #004000;
  color: #149EF2;
}
input[type='submit'] {
  background-color: #149EF2;
  border-radius: 15px;
  border: none;
  font-weight: bold;
  color: white;
  font-size: 15px;
  padding: 10px 30px;
  cursor: pointer;
}

label {
  font-weight: bold;
  color: #FF9E03;
  font-size: 14px;
  margin-right: 10px;
  padding: 10px;
  text-align: center;
}
h1 {
  color: #FF9E03;
  font-size: 40px;
}
select {
  border: 1px solid #FF9E03;
  background-color: #149EF2;
  color: #004000;
  font-weight: bold;
  font-size: 12px;
  border-radius: 10px;
  margin-top: 2rem;
  margin-right: 1px;
  padding: 10px 30px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-weight: 100;
  text-align: center;
  direction:RTL
}
textarea{
  border: 1px solid #FF9E03;
  background-color: #149EF2;
  color: #004000;
  font-weight: bold;
  font-size: 15px;
  border-radius: 10px;
  margin-top: 1rem;
  margin-right: 1px;
  padding: 10px 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-weight: 100;
  text-align: center;
  transform: 3s cubic-bezier(0.075, 0.82, 0.165, 1);
  caret-color: #ffff00;
  cursor: pointer;
  direction:RTL

  
}
.bab{
margin-left:-50px;

}
.cac{
margin-left: -40px;

}
.baba{
text-align: center;


}
input:not(:placeholder-shown) {
  border-color: hsl(0, 76%, 50%);;
}
input:valid {
  border-color: hsl(120, 76%, 50%);
}

</style>
<body>
 <div class="container">
   <form action="porocess.php" method="post">
    <h1>اطلاعات خود را وارد کنید</h1>
    <label for=""> Name:</label>
    <input type="text" name="name"   maxlength="15"   id="name" value="نام را وارد کنید" required="required" >  <br>
    <label for="namefamily"> family:</label>    
    <input type="text" name="namefamily" maxlength="10"  id="namefamily" value="نام خانوادگی را وارد کنید"required="required"> <br>
    <label for="email"> email:</label>
    <input type="text" name="email" maxlength="18"  id="email" value="ایمیل را وارد کنید"> <br> 
    <label class="bab" for="PhoneNumber">PhoneNumber:</label>
    <input type="text" class="cam"  maxlength="11"  name="PhoneNumber" id="PhoneNumber"  value="شماره تلفن را وارد کنید"  min="0" max="9"required/> <br>
    <label  class="cac" for="cardnumber">Nationalcard:</label>
    <input  type="text" name="cardNumber"  maxlength="10"  id="cardNumber" value="شماره کارت ملی را وارد کنید"required="required" > <br>
    <label for="password">Password</label>
    <input type="text" name="Password" id="Password" value="رمز عبور را وارد کنید" required="required"> <br> 
    <label class="baba" for="">Address:</label> 
    <textarea name="address"   cols="30" rows="5" maxlength="250" value="نشانی وارد کنید" id="address"></textarea> <br>
    <label  for="man">man</label>
    <input name="gender" id="gender" type=checkbox> 
    <label for="">woman</label>
    <input name="gender" id="gender"  type=checkbox> <br>
    <select id="country" name="country" >
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
        <option value="uk">UK</option>
        <option value="india">India</option>
        <option value="japan">Japan</option>
        <option value="korea">Korea</option>
        <option value="thailand">Thailand</option>
        <option value="vietnam">Vietnam</option>
        <option value="iran">Iran</option> 
        <option value="other">Other</option>
      </select> <br> <br>
      <input type="submit" name="submit" value="ارسال"> <br> <br>
  <form>
</div>
</body>





</html>

