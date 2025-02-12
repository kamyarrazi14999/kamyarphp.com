<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>map</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<style>
    /* برای استایل مپ  */
#map{
    height: 900px;
    width: 100%;
    margin: 20px;
    font-family: sans-serif ;
    @font-face {
        font-family: 'iran_sans';
        src: url('iran_sans/iran_sans.ttf'); 
    }
    
 
}
input , button {
    display: block;
    margin: 5px 0px;
    padding: 10px;
    background-color: #fff;
    direction: rtl;


}
.delete-btn {
    background-color: red;
    margin: 5px;
    cursor: pointer;
    border-radius: 5px;
    color:white;
    font-weight: bold;
    padding: 5px;
    font-size: 10px;
}
.delete-btn:hover {
    
    background-color: darkred;
    color: #f2f2f2;
}

</style>
<body>
    <h2>لوکیشن کابران موقعیت مکانی</h2>
    <p>روی مپ کلیک کنید برای انتخاب لوکیشن</p>
    <input type="text" id="search" placeholder="جستجو  مکان های ذخیره شده ">
    <div id="map"></div>
    <form action="" id="add-location" method="post">
        <input type="text" name="name" placeholder="نام مکان">
        <input type="text" name="lat" placeholder="طول جغرافیایی">
        <input type="text" name="lng" placeholder="عرض جغرافیایی">
        <button type="submit">افزودن</button>

    </form>
</body>
<script >
    // کانتریتور لوکیشن
    var map = L.map('map').setView([35.7076, 51.2652], 12);
    // ایجاد لایه نقشه

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    //ایجاد مارکرها , مدیریت مارکرها
    let marker;
    let markers =[];
//  ایکون برای مکان های ذخیره شده
   let sevedlocationIcon = L.icon({
    iconUrl: './download.png',
    iconSize: [24, 41],
    iconAnchor: [12, 41],
    popupAnchor: [0, -34]
  });
//   مکان جدید ذخیره شده را بارگذاری کردن
    let newlocationIcon = L.icon({
        iconUrl: './woman.png',
        iconSize: [38, 95],
        iconAnchor: [22, 94],
        popupAnchor: [0, -76]
        
      });
     function lodeSavedLocations(){
        $.ajax({
            url: 'api.php',
            type: 'GET',
            success: function(response){
                markers.forEach(map.removeLayer(m)) ;
                markers = [];
                response.forEach(loc=> {

               let newmarker =l.marker([loc.lat,loc.lng],{icon: sevedlocationIcon}).addTo(map)
               .bindpopup(`<strong>${loc.name}
               <a href="delet-location.php?id=${loc.id}"  class="delete-btn" data-id="${loc.id}">حذف</a>
               
               
               
               </strong>
            
               `);
                });
            }
                    
    
          
        });
   
     }
</script>
</html>