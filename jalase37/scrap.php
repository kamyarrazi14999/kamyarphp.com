<?php 
// تابع برای دریافت محتوای HTML
function get_web_page($url){
    // شروع یک جلسه برای استخراج اطلاعات
    $ch = curl_init();
    // تنظیمات برای درخواست از جلسه و لینکی که قرار است اطلاعات از آن استخراج شود
    curl_setopt($ch, CURLOPT_URL, $url);
    // تبدیل اطلاعات دریافت شده در قالب رشته
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // ورفای انجام نشه
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // دنبال کردن ریدایرکت ها کدهای 300-399
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // تنظیمات هدر
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');


    // ارسال و دریافت پاسخ 
    $response = curl_exec($ch);
    // بستن درخواست 
    curl_close($ch);
    // بازشگت محتوا به محل درخواست 
    return $response;

}


$url = 'https://divar.ir/s/tehran/mobile-phones/alcatel/alcatel-1';
$html = get_web_page($url);

// تبدیل آبجکت به دام 
$dom = new DOMDocument();
// هندل کردن خطاهای احتمالی 
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);

// گرفتن اطلاعات از نام کلاس و تگ مورد نظر 
$ads = $xpath->query("//article[contains(@class,'kt-post-card')]");

// بررسی اینکه آیا آگهی موجود است یا نه 
 if ($ads->length > 0) {
    echo "<h2> استخراج اطلاعات از وب سایت دیوار </h2> <ul>";
    foreach ($ads as $ad) {
        
        // دریافت عنوان آگهی
        $titleNode = $xpath->query(".//h2[@class='kt-post-card__title']", $ad);
        $title = $titleNode->length > 0 ? trim($titleNode->item(0)->nodeValue) : 'عنوان یافت نشد';         


        // دریافت جزئیات محصول
        $desNode = $xpath->query(".//div[@class='kt-post-card__description']", $ad);
        $des = $desNode->length > 0 ? trim($desNode->item(0)->nodeValue) : 'جزئیات یافت نشد';

        // دریافت قیمت آگهی
        $priceNode = $xpath->query(".//div[@class='kt-post-card__description'][2]", $ad);
        $price = $priceNode->length > 0 ? trim($priceNode->item(0)->nodeValue) : 'قیمت یافت نشد'; 


        // دریافت تصویر آگهی 
        $imgNode = $xpath->query('.//div[contains(@class,"kt-post-card-thumbnail")]//img', $ad);
        $img = 'تصویر موجود نیست';
        if ($imgNode->length > 0) {
            $img = $imgNode->item(0)->getAttribute("data-src") ? : $imgNode->item(0)->getAttribute("src");
        }



        // link ads
        $linkNode = $xpath->query(".//a[@class='kt-post-card__action']", $ad);
        $link = $linkNode->length > 0 ? "https://divar.ir". trim($linkNode->item(0)->getAttribute('href')) : '#';

        // Location
        $locationNode = $xpath->query(".//div[@class='kt-post-card__bottom']//span", $ad);
        $location = $locationNode->length > 0 ? trim($locationNode->item(0)->nodeValue) : 'مکان یافت نشد';

        echo "<li> <a href='$link' target='_blank'> <b> $title </b> </a> $price </br> $location </br> <img src='$img' style='max-width:100px'> <br> $des  <li>";
      
        echo "<hr>";

    }
    echo "</ul>";
}else {
    echo "آگهی موجود نیست";
}

?>