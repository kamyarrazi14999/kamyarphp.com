<?php
// تغییرات در کلاس استفاده می شود 

final class FinalClass
{
    // این کلاس باقی می ماند و نمی تواند تغییر کند یا به عنوان ارث بردن استفاده شود.
    // این کلاس تنها در زمان تعریف کلاس می تواند یک متد final را داشته باشد که باقی از قابلیت‌های آن نمی توانند تغییر کند.
    // این متد با استفاده از کلیدواژه final نمی تواند با نام متدی تغییر کند.

    final public function finalMethod()
    {
        echo "این متد نمی تواند تغییر کند";
    }
}
class Base {
    final public function finalmethod() {
        echo "This is a final method in Base class";
    }
}
// این متد نمی توانند تغییر کند

?>