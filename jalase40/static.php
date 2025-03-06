<?php
class counter {
public static $count = 10;

    public static function increment() {
        self::$count++;
    }
    // برای نمایش تعداد استفاده شده
    public static function getcount() {
        return self::$count;
    }
}
// برای شی های که نیاز به تغییر ندارد 
counter::increment();

echo counter::getcount(); // نمایش تعداد استفاده شده: 1 نمایش تعداد استفاده شده: 1



?>