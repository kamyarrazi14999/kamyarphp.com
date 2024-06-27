<?php
// echo date ('Y-m-d h:i:s');
// echo "<hr/>";
// echo time();
// $mytime = mktime(14,20,0,7,2,2025);
// $mytime = strtotime("14:30:20 2025-07-02");
// $mytime=date_create("2025-07-02");
// date_modify($mytime, "+1 month");
// echo date_format($mytime, 'Y-m-d ');
// var_dump($mytime);

$date1= date_create('2024-07-20');
$date2= date_create('2029-08-20');
echo "Date 1:",date_format($date1,'Y-m-d');echo "<br>";
echo " Date 2:",date_format($date2,'Y-m-d');
$diff=date_diff($date1, $date2);

echo "<pre>";
var_dump($diff->days);
$timeset=$diff->days;
echo "</pre>";
echo 'تاریخ اعتبار روز اکانت شما می باشد' . $timeset
?>