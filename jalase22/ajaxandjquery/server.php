<?php
$data = [
    "massage" => "سلام این داده ها از سمت سرور دریافت شده است ",
    "time" => date("Y-m-d H:i:s")
];
header(header: 'Content-Type: application/json');
echo json_encode($data);


?>