<?php

$items = [933,529,313,831,687,893,363,641,599,467,99,285,735,577,783,41,591,367,997,909,381,437,833,835,347,328,936,482,640,712,436,74,834,520,646,662,484,150,198,358,48,202,128,650,380,28,126,714,552,900];


$item2 = ["411","exit","51","key","309","php","775","583","449","variable","if","528","870","840","echo","776","666","322","536","712"];


$item3 = [
    "411",
    "exit",
    "key",
    "309"=>[94],
    "php"=>[],
    "449",
    "variable",
    "if",
    "840"=>[
        1,2,3,4,5,6,7=>[
            'test',85,100,'case'
        ]
    ],
    "echo"=>[
        50
    ],
    "776",
    ["536",2],
    "712",
    ["915"]
    ];


//Tapşırıq 1
//$items massivinin elementlerinin sayını tapın (Kənar funksiyalardan istifadə etmədən).
  
$items = [933,529,313,831,687,893,363,641,599,467,99,285,735,577,783,41,591,367,997,909,381,437,833,835,347,328,936,482,640,712,436,74,834,520,646,662,484,150,198,358,48,202,128,650,380,28,126,714,552,900];

$number = 0;

foreach ($items as $item) {
    $number++;
}
echo "$number <br><br>";

//Tapşırıq 2
//$items massivdə ən böyük və ən kiçik elementini tapın (Kənar funksiyalardan istifadə etmədən).

$items = [933,529,313,831,687,893,363,641,599,467,99,285,735,577,783,41,591,367,997,909,381,437,833,835,347,328,936,482,640,712,436,74,834,520,646,662,484,150,198,358,48,202,128,650,380,28,126,714,552,900];

$max = $items[0];
$min = $items[0];

foreach ($items as $item) {
    if ($item > $max) {
            $max = $item;
        }
        if ($item < $min) {
            $min = $item;
        }
     }
echo"$max <br>";

echo"$min <br><br>";

//Tapşırıq 3
// $items massivdə tək və çüt ədədlərı alt-alta yazın.

$items = [933,529,313,831,687,893,363,641,599,467,99,285,735,577,783,41,591,367,997,909,381,437,833,835,347,328,936,482,640,712,436,74,834,520,646,662,484,150,198,358,48,202,128,650,380,28,126,714,552,900];

$even = [];
$odd = [];

foreach ($items as $item) {
    if ($item % 2 == 0) {
        $even[] = $item;
    } else {
        $odd[] = $item;
    }
}

echo "Even numbers: ";
print_r($even);
echo "<br>Odd numbers: ";
print_r($odd);


//Tapşırıq 4
// $items2 massivdə integer dəyərləri alt-alta yazın.

$items2 = ["411","exit","51","key","309","php","775","583","449","variable","if","528","870","840","echo","776","666","322","536","712"];

foreach ($items2 as $item) {
    if (is_numeric($item)) {
        echo $item . "<br><br>";
    }
}

//Tapşırıq 5
// $items2 massivdə ədədlərin cəmini tapın (Kənar funksiyalardan istifadə etmədən).

$items2 = ["411","exit","51","key","309","php","775","583","449","variable","if","528","870","840","echo","776","666","322","536","712"];

$sum = 0;

foreach ($items2 as $item) {
    if (is_numeric($item)) {
        $sum += $item;
    }
}

echo "Numbers: " . $sum . "<br><br>";

//Tapşırıq 6

//$items2 massivdə tək və çüt ədədlərin ayrı ayrılıqda cəmini tapın.

$items2 = ["411","exit","51","key","309","php","775","583","449","variable","if","528","870","840","echo","776","666","322","536","712"];

$evenSum = 0;

$oddSum = 0;

foreach ($items2 as $item) {
    if (is_numeric($item) && $item % 2 == 0) {
        $evenSum += $item;
    } elseif (is_numeric($item)) {
        $oddSum += $item;
    }
}

echo "Even numbers: " . $evenSum . "<br>";

echo "Odd numbers: " . $oddSum . "<br><br>";

//Tapşırıq 7
// $items2 massivdə stringləri elementləri alt-alta yazın (Kənar funksiyalardan istifadə etmədən).

$items2 = ["411","exit","51","key","309","php","775","583","449","variable","if","528","870","840","echo","776","666","322","536","712"];

foreach ($items2 as $item) {
    if (is_string($item)) {
        echo $item . "<br>";
    }
}

//Tapşırıq 8
// $items3 massivdə stringlər key-ləri alt-alta yazın(Kənar funksiyalardan istifadə etmədən).
$item3 = [
    "411",
    "exit",
    "key",
    "309"=>[94],
    "php"=>[],
    "449",
    "variable",
    "if",
    "840"=>[
        1,2,3,4,5,6,7=>[
            'test',85,100,'case'
        ]
    ],
    "echo"=>[
        50
    ],
    "776",
    ["536",2],
    "712",
    ["915"]
    ];
    
foreach ($item3 as $key => $value) {

    if (is_string($key)) {
        echo $key . " "; "<br>";
    }
}

//Tapşırıq 9
//$items3 massivdə int key-lərin cəmini tapın(Kənar funksiyalardan istifadə etmədən.is_array istisna olmaqla).

$item3 = [
    "411",
    "exit",
    "key",
    "309"=>[94],
    "php"=>[],
    "449",
    "variable",
    "if",
    "840"=>[
        1,2,3,4,5,6,7=>[
            'test',85,100,'case'
        ]
    ],
    "echo"=>[
        50
    ],
    "776",
    ["536",2],
    "712",
    ["915"]
    ];
    
$sum = 0;

foreach ($item3 as $key => $value) {
    if (is_int($key) && is_array($value)) {
        $sum += array_sum($value);
    }
}

echo "Sum of integer keys: ". $sum. "<br><br>";

//Tapşırıq 10
//$items3 massivdə ədədlərin cəmini tapın.

$item3 = [
    "411",
    "exit",
    "key",
    "309"=>[94],
    "php"=>[],
    "449",
    "variable",
    "if",
    "840"=>[
        1,2,3,4,5,6,7=>[
            'test',85,100,'case'
        ]
    ],
    "echo"=>[
        50
    ],
    "776",
    ["536",2],
    "712",
    ["915"]
    ];
    
$sum = 0;

foreach ($item3 as $value) {
    if (is_numeric($value)) {
        $sum += $value;
    }
}

echo "Sum of numbers: ". $sum. "<br>";



    
