<form action="" method="post">
    <input type="text" name="text">
    <input type="submit">
</form>

<?php

$person = array('kamiyar','razi ', 37, 1, 'A');

// Nested array
 $persons = [
    '1234' => ['kamiyar','razi ', 37, 1986],
    '1238' => ['mani','nima',33,1984],
    '1224' => ['sara','karmi',32,1985],
    '1245' => ['Mahan','roya',32,1985],
];

echo "<pre>";
$result = in_array($name, $person);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['text'];

    if ($result) {
        echo 'نام کاربرری از قبل موجود است ';
        echo '<br/>';
        print_r($person);
    } else {
        array_unshift($person, $name);
        echo 'نام کاربرری ساخته شد';
        echo '<br/>';
        print_r($person);
    }
}

echo "</pre>";
?>