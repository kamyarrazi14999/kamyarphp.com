<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <script>
        // create a new ajax request
     function fetchData() {
        const xhr = new XMLHttpRequest();
        // یک درخواست غیر همگان از طریق متد get به فایل که در لینک زیر آمده است
      xhr.open('GET','server.php',true);
        xhr.onload = function() {
     
     if(xhr.status === 200) {
        const response =JSON.parse(xhr.responseText);
        document.getElementById('result').innerHTML = response.massage +"time: "+response.time;
     } else {
        document.getElementById('result').innerHTML = `Error: ${xhr.status}`;
     } 
        }
        xhr.send();
    };
     
    </script>
</head>
<body>
    <h1>AJAX Example</h1>
    <button onclick="fetchData()"> دریافت اطلاعات از سرور یا بانک اطلاعات</button>
    <div id="result"> اطلاعات دریافتی اینجا نمایش داده می شود</div>
</body>
</html>


