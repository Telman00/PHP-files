<?php

// Tapşırıq 1:

// $searchKeys arrayındakı elemtlərin hər biri $items arrayında olan keyləri uyğun gəlirsə uyğun gələn 
//key və value yeni bir arraya yazılsın və sonda print_r ilə ekrana verilsin əks halda  “Nəticə tapılmadı” yazılsın.
//(array_key_exists() istifadə etmədən)

// Nümunə:


// $items = ['test1'=>'value1','test2'=>'value2','test3'=>'value3','test4'=>'value4','test5'=>'value5'];

// $searchKeys = ['gN','test1','test2'];

// Nəticə Tapılmadı !

// Nümunə2:

// $items = ['test1'=>'value1','test2'=>'value2','test3'=>'value3','test4'=>'value4','test5'=>'value5'];

// $searchKeys = ['test3','test1','test2'];

// ['test1'=>'value1','test2'=>'value2','test3'=>'value3'];





$items = [
    'OinVkPr' => 'erNzZ',
    'FWc' => 'wUpEaS',
    't' => 'OlY',
    'ctU' => 'KVG',
    'wN' => 'Q',
    'aAPH' => 'TqgyM',
    'Lm' => 'VyqoKMP',
    'mBy' => 'YC',
    'lKiwFOJv' => 'PEG',
    'JgHya' => 'IaxFMlBZk',
    'gN' => 'MPlEbe',
    'XP' => 'wZse',
    'WQOpYCRul' => 'KtIOgy',
    'WtYOyGN' => 'YxOkuCR',
    'Gako' => 'jdL',
    'YkSyhO' => 'VkQFlqhg',
    'Xf' => 'BmaZlKSgt',
    'IhvWXaE' => 'AyFB',
    'fB' => 'snBUIK',
    'THkzRvE' => 'TBm'
];

$searchKeys = ['gN', 'test', 'Xf', 'jdL'];

function findKeys($items, $searchKeys) {
    $result = [];

    foreach ($searchKeys as $key) {
        if (isset($items[$key])) {
            $result[$key] = $items[$key];
        }
    }

    return $result;
}

$result = findKeys($items, $searchKeys);

if (empty($result)) {
    echo "Nəticə tapılmadı!";
} else {
    print_r($result);
    echo "<hr>"; 
}


//Tapşırıq 2

// Yeni bir array yaradaraq $items arrayındakı elementləri unikal olarak yeni yaradılan arraya əlavə edin.
// (array_unique() dən istifadə etmədən)

$items = ["banana","fig","apple","elderberry","mango","kiwi","cherry","date","apple","grape","nectarine","banana",
"honeydew","lemon","kiwi","cherry","orange","raspberry","fig","strawberry","elderberry","mango","lemon","date",
"grape"];

sort($items); 
$input = [];

for ($i = 0; $i < count($items); $i++) {
    if ($i === 0 || $items[$i] !== $items[$i - 1]) {
        $input[] = $items[$i]; 
    }
}

print_r($input);
echo "<hr>";


// Tapşırıq 3:


// Yeni bir array yaradılaraq $items arrayında hansı element nə qədər təkrarlanıbsa yeni yaradılmış arraya 
//həmin elementi key olaraq təkrarlanma sayını isə value olaraq əlavə edin.(array_count_values() 
//gördüyü iş görüləcək lakin array_count_values() dən istifadə etmədən)

$items = ["banana", "fig", "apple", "elderberry", "mango", "kiwi", "cherry", "date", "apple", "grape", 
           "nectarine", "banana", "honeydew", "lemon", "kiwi", "cherry", "orange", "raspberry", 
           "fig", "strawberry", "elderberry", "mango", "lemon", "date", "grape"];

sort($items);
$count = []; 


foreach ($items as $item) {
    $count[$item] = ($count[$item] ?? 0) + 1; 
}

print_r($count);

echo "<hr>";

//Tapşırıq 4:

//Verilən $values ve $keys arraylarında istifadə edərək yeni bir array yaradın ve $keys arrayında olan dəyərlər 
//yeni arraya key kimi $values arrayında olan dəyərləri isə value kimi yeni yaradılmış arraya yazın
//(array_combine() istifadə etmədən)

$values = ['Name','Surname','Age'];
$keys = ['Jon','Doe',20];

$result =[];

foreach ($keys as $key => $value) {
    $result[$value] = $values[$key];
}

print_r($result);
echo "<hr>";

//Tapşırıq 5:

//$array2 də olub $array1 olmayan dəyərləri yeni bir array yaradıb yeni yaradılmış arraya ələvə edin(array_diff() 
//istifadə etmədən).

$array1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$array2 = [3, 6, 9, 12, 15, 16, 17, 18];

$result = [];

foreach ($array2 as $value){

    if (!in_array($value, $array1)) {
        $result[] = $value;
    }

    }
    
print_r($result);

echo "<hr>";

//Tapşırıq 6:

// $email stringində verilən index qədər söz görünsün(substr() istifadə etmədən)

// Nümunə:
// $index = 2;

// Out: nak

// Nümunə 2:
// $index = 16;

// Out: nakhiyev.alakhber

$index = 4;
$email  = 'nakhiyev.alakhber@gmail.com';
$String = "";

for ($i = 0; $i < strlen($email); $i++) {
    if ($i === $index) {
        break;
    }
    $String.= $email[$i];
}
print_r($String);

echo "<hr>";

//Tapşırıq 7:

// $email arrayında olan elementləri verilmiş simvol ilə birləşdirərək string formasına yazın(implode() 
//istifadə etmədən)

// Nümunə:
// $smvl = ‘*’;

// Out: n*a*k*h*i*y*e*v*.*a*l*a*k*h*b*e*r*@*g*m*a*i*l*.*c*o*m

// Nümunə 2:
// $smvl = -;


// Out: n-a-k-h-i-y-e-v-.-a-l-a-k-h-b-e-r-@-g-m-a-i-l-.-c-o-m

$smvl = '*';


$email  = ['n','a','k','h','i','y','e','v','.','a','l','a','k','h','b','e','r','@','g','m','a','i','l','.','c',
'o','m'];

$result = '';

for ($i = 0; $i < count($email); $i++) {
    $result .= $email[$i];
    if ($i < count($email) - 1) {
        $result.= $smvl;
    }
}

print_r($result);

echo "<hr>";

//Tapşırıq 8:

//$lenth sayı qədər $simvol dəyərini $value dəyərinin sonuna yazın.Əgər $value-nin uzunlugu $lenth-ə bərabərdirsə 
//o zaman sadece $value çap olunsun(str_pad() istifadə etmədən)

$lenth = 10;
$smvl = '*';
$value = "Test";

if (strlen($value) < $lenth) {
    while (strlen($value) < $lenth) {
        $value .= $smvl; 
    }
}

print_r($value);
echo "<hr>";

//Tapşırıq 9:

//$email uzunluğunu tapın (strlen() istifadə etməklə lazım gəlsə str_split() istifadə edə bilərsiniz)

$email = 'nakhiyev.alakhber@gmail.com';

$length = 'nakhiyev.alakhber@gmail.com';

print_r(strlen($length));

echo "<hr>";

//Tapşırıq 10:

//foreach() dən istifadə edərək $items arrayını string kimi cap edin.(count ve if istifadə etməklə)

//“Out” bu formada olmalıdır

$items = ["test1"=>"value1","test2"=>"value2","test3"=>"value3","test4"=>"value4","test5"=>"value5"];

$result = "";
$count = count($items);

foreach ($items as $key => $value) {
    $result .= "$key => $value";
}

if ($count > 0) {
    $result.= ", ";
}

print_r($result);

echo "<hr>";



    


















?>
