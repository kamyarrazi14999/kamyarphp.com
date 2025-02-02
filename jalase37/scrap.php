<?php
// تابع برای دریافت محتوای وبسایت html
function get_web_page($url){
    // این تابع دریافت محتوای وبسایت را دریافت میکند
$ch = curl_init();
// تنظیمات برای دریافت محتوای وبسایت استخراج میکند
// لیتک محتوای وبسایت اطلاعات از آن استخراج می شود
    curl_setopt($ch, CURLOPT_URL, $url);
    // تبدیل محتوای وبسایت به رشته است
    curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    // verify ssl کار نکن
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // follow location کردن تغییرات لینکی
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // تنظیمات هدر دریافت شده
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36");
    // ارسال و دریافت پاسخ 
    $respons=curl_exec($ch);
    // بستن درخواست
    curl_close($ch);
    // بازگشت محتوای وبسایت
    return $respons;
}
$url ='';
$html=get_web_page($url);
$dom = new DOMDocument();



?>