<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css">
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    
    

    <title>Map</title>
    <style>
    /* Add your custom styles here */
    #map {
        height: 900px;
        width: 100%;
        margin: 20px;
    }

    input, button {
        display: block;
        margin: 5px 0;
        background-color: #ffff;
        padding: 10px;
        transition: all 0.3s ease-in-out;
        border-radius: 5px;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        color: #333;
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 5px #4CAF50;
        border-color: #4CAF50;
    }

    .delete-btn {
        background-color: red;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: white;
        font-weight: bold;
        padding: 5px;
        font-size: 12px;
    }

    .delete-btn:hover {
        background-color: darkred;
    }

    .edit-btn {
        background-color: blue;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: white;
        font-weight: bold;
        padding: 5px;
        font-size: 12px;
    }

    .edit-btn:hover {
        background-color: darkblue;
    }

    .route-btn {
        background-color: green;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: white;
        font-weight: bold;
        padding: 5px;
        font-size: 12px;
    }

    .route-btn:hover {
        background-color: darkgreen;
    }

    /* Custom styles for map */
    .leaflet-popup-content {
        min-width: 200px;
    }

    .leaflet-popup-content-wrapper {
        padding: 10px;
    }

    .leaflet-popup-content-wrapper .leaflet-popup-tip {
        margin-left: -10px;
    }

    .leaflet-popup-content h3 {
        margin: 0;
        padding: 0;
        font-size: 18px;
    }

    .leaflet-popup-content p {
        margin: 5px 0;
        padding: 0;
    }
</style>
</head>
<body>
    <h2>لوکیشن کاربران موقعیت مکانی کاربران</h2>
    <p>روی مپ کلیک کنید برای انتخاب لوکیشن</p>
    <input type="text" id="search" placeholder="جستجوی مکان های ذخیره شده...">
    <div id="map"></div>

    <form action="" id="addLocation">
        <input type="text" id="name" placeholder="نام لوکیشن">
        <input type="text" id="latitude" placeholder="Latitude">
        <input type="text" id="longitude" placeholder="Longitude">
        <button type="submit">افزودن لوکیشن</button>
    </form>

    <script>
        let map = L.map('map').setView([35.7076, 51.2652], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // مدیریت مارکرها
        let marker;
        let markers = [];
        let routingControl;
;        // تعریف آیکن برای مکانهای ذخیره شده
        let savedLocationIcon = L.icon({
            iconUrl: 'car.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [0, -34]
        });

        // تعریف آیکن برای مکان جدید 
        let newLocationIcon = L.icon({
            iconUrl: 'current.png',
            iconSize: [40, 70],
            iconAnchor: [16, 60],
            popupAnchor: [0, -76]
        });
        function loadLocations(){
            $.ajax({
                url: 'api.php',
                type: 'GET',
                success: function(response){
                    markers.forEach(m => map.removeLayer(m));
                    markers = [];
                    response.forEach(loc =>{
                        let newMarker = L.marker([loc.latitude, loc.longitude], {icon: savedLocationIcon})
                            .addTo(map)
                            .bindPopup(
                                `<strong>${loc.name}</strong>
                                <a href="delete_location.php?id=${loc.id}" class="delete-btn" onclick="return confirm('آیا مطمئن هستید؟')" data-id="${loc.id}">حذف</a>
                                <button class="edit-btn" onclick="editLocation(${loc.id}, '${loc.name}', ${loc.latitude}, ${loc.longitude})">ویرایش</button>
                                <button class="route-btn" onclick="routeTo(${loc.latitude}, ${loc.longitude})">مسیریابی</button>`
                            );
                        
                        markers.push(newMarker);
                    });
                }
            });
        }

        // نمایش لوکیشن های قبلی در مپ
        $(document).ready(function(){
            loadLocations();
        });

        // اضافه کردن مارکرها به مپ
        map.on('click', function(e){
            let lat = e.latlng.lat.toFixed(6);
            let lng = e.latlng.lng.toFixed(6);

            if(marker){
                map.removeLayer(marker);
            }

            // استفاده از آیکن جدید برای مارکر 
            marker = L.marker([lat, lng], {icon: newLocationIcon}).addTo(map);
            $('#latitude').val(lat);
            $('#longitude').val(lng);

            // افزودن دکمه مسیریابی به مکان جدید
            marker.bindPopup(
                `<button class="route-btn" onclick="routeTo(${lat}, ${lng})">مسیریابی</button>
                <button class="weather-btn" onclick="showWeather(${lat}, ${lng})">نمایش آب و هوا</button>`
            ).openPopup();
        });

        // نمایش اطلاعات آب و هوا
        function showWeather(lat, lng) {
            $.ajax({
               
                 url: `//api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&units=metric&appid=f235a7d1451b2be4b94e8ad0ce5fb084`,
                type: 'GET',
                success: function(response) {
                    let weatherInfo = `
                        <strong>آب و هوا:</strong> ${response.weather[0].description}<br>
                        <strong>دما:</strong> ${response.main.temp} °C<br>
                        <strong>رطوبت:</strong> ${response.main.humidity} %<br>
                        <strong>سرعت باد:</strong> ${response.wind.speed} m/s
                    `;
                    L.popup()
                        .setLatLng([lat, lng])
                        .setContent(weatherInfo)
                        .openOn(map);
                }
            });
        }

        // جستجوی مکان‌های نزدیک
        $('#search').on('input', function(){
            let searchText = $(this).val().toLowerCase().trim();
            markers.forEach(m => {
                let popupText = m.getPopup().getContent().toLowerCase();
                if(popupText.includes(searchText)){
                    map.setView(m.getLatLng(), 14);
                    m.openPopup();
                }
            });

            if (searchText.length > 0) {
                $.ajax({
                    url: `https://nominatim.openstreetmap.org/search?format=json&q=${searchText}`,
                    type: 'GET',
                    success: function(response) {
                        response.forEach(loc => {
                            let newMarker = L.marker([loc.lat, loc.lon], {icon: savedLocationIcon})
                                .addTo(map)
                                .bindPopup(
                                    `<strong>${loc.display_name}</strong>
                                    <button class="route-btn" onclick="routeTo(${loc.lat}, ${loc.lon})">مسیریابی</button>
                                    <button class="weather-btn" onclick="showWeather(${loc.lat}, ${loc.lon})">نمایش آب و هوا</button>`
                                );
                            
                            markers.push(newMarker);
                        });
                    }
                });
            }
        });

        // ارسال اطلاعات به سرور و ذخیره سازی آن در دیتابیست 
        $('#addLocation').submit(function(e){
            e.preventDefault();

            let name = $('#name').val();
            let latitude = $('#latitude').val();
            let longitude = $('#longitude').val();
            if(!latitude || !longitude){
                alert('لطفا موقعیت مکان را مشخص کنید.');
                return;
            }
            $.post('add_location.php', {name, latitude, longitude}, function(response){
                alert('موقعیت مکانی با موفقیت اضافه شد.');
                loadLocations();
            });
        });

        // ویرایش موقعیت مکانی
        function editLocation(id, name, latitude, longitude) {
            $('#name').val(name);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            $('#addLocation').off('submit').on('submit', function(e){
                e.preventDefault();
                $.post('edit_location.php', {id, name, latitude, longitude}, function(response){
                    alert('موقعیت مکانی با موفقیت ویرایش شد.');
                    loadLocations();
                });
            });
        }

        // مسیریابی بین دو نقطه
        function routeTo(lat, lng) {
            if (routingControl) {
                map.removeControl(routingControl);
            }
            routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(map.getCenter().lat, map.getCenter().lng),
                    L.latLng(lat, lng)
                ],
                routeWhileDragging: true
            }).addTo(map);

            // نمایش مسافت و زمان مسیریابی
            routingControl.on('routesfound', function(e) {
                let routes = e.routes;
                let summary = routes[0].summary;
                L.popup()
                    .setLatLng([lat, lng])
                    .setContent('فاصله: ' + (summary.totalDistance / 1000).toFixed(2) + ' کیلومتر<br>زمان: ' + (summary.totalTime / 60).toFixed(2) + ' دقیقه')
                    .openOn(map);
            });
        }
    </script>
</body>
</html>