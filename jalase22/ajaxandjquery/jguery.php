<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery</title>
</head>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<body>
    <!--مثال تغییرمتن -->
    <h1>Hello jQuery!</h1>
    <button id="changebutton">Change Text</button>
    <p id="textExample">This is a paragraph.</p>
    <!--  مثال در مورد تغییر استایل-->
      <h2>This is a heading</h2>
      <button id="changeStyle">Change Style</button>
      <p id="headingExample" >This is a paragraph with a red color.</p>
      <!--نمایش یا پنهان کردن متن -->
      <button id="hideText">Hide Text</button>
      <p id="showTextExample">This is a hidden paragraph.</p>
      <!--مثال انمیشن   -->
      <button id="animateButton">showe/hide</button>
      <p id="animateExample"> متن در اینجا نمایش داده می شود</p>
      <!-- مثال انمیشن2 -->
       <button id="animateButtonx" >animation</button>
      <div id="animateExample" style="width:100px; height: 100px; background-color: red;">

      </div>

   

</body>
</html>

<script>
    $(document).ready(function() {
        $("#changebutton").click(function() {
            $("#textExample").text("متن جدید وارد شد");
        });
    });

    $(document).ready(function() {
        $("#changeStyle").click(function() {
            $('#headingExample').css('color', '#123456');
        });
    });
    
    $(document).ready(function() {
        $("#hideText").click(function() {
            $("#showTextExample").toggle();
        });
    });

    $(document).ready(function() {
        $("#animateButton").click(function() {
            $("#animateExample").slideToggle();
        });
    });
    $(document).ready(function() {
        $("#animateButtonx").click(function() {
            $("#animateExample").animate({
                width: '200px',
                height: '200px',
             
            } , 1000).
            animate({
                width: '100px',
                height: '100px',
            }, 1000);

           
        });
    });

</script>