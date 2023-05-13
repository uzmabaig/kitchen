<?php
// indexed/numeric array
// exp 1
$name = array("Hina","Atfa","Syeda");
echo $name[0];
echo "</br>";
// exp 2
$fruit = array (
    'Apple',
    'Grapes',
    'Orange'

);
echo $fruit [2];
echo "</br>";

// Associative array
// exp 1
$salaries = array("mohammad" => 2000, "qadir" => 1000, "zara" => 500);
echo $salaries["qadir"];
echo "</br>";
// exp 2
$weather_update = array (
    'Summer'=> '37C',
    'Winter'=> '15C'
);

echo $weather_update['Winter'];
echo "</br>";
// exp 3
$continents = [
   [
       'country' => 'Ethiopia',
       'population' => '114,963,588',
       'language' => 'Amharic'
    ],
   [
      'country' => 'Qatar',
      'population' => '2,881,060 million',
      'language' => 'Arabic'
   
   ],
   [
      'country' => 'Jamaica',
      'population' => '2,961,161',
      'language' => 'English'
   ],
   [
      'country' => 'Russia',
      'population' => '144.7 million',
      'language' => ' Russian '
   ],
   
];
foreach($continents as $i => $country){
   echo $country['language'];
}

echo "</br>";
// Multidimensional array
// exp 1
$marks = [
    "mohammad" => 
    [
       "physics" => 35,
       "maths" => 30,   
       "chemistry" => 39
    ],

    "qadir" => 
    [
       "physics" => 30,
       "maths" => 32,
       "chemistry" => 29
    ],

    "zara" => 
    [
       "physics" => 31,
       "maths" => 22,
       "chemistry" => 39
    ]
    ];
 echo $marks ["zara"]["chemistry"];
 echo "</br>";
// exp 2
$fruits = [
   "Mango" =>
   [
      "color"=> "yellow",
      "taste"=>"sweet and sour",
      "season"=>"summer"
   ],
   "watermelon" =>
   [
      "color"=> "red",
      "taste"=>"sweet",
      "season"=>"summer"
   ],
   "guava" =>
   [
      "color"=> "white",
      "taste"=>"sweet",
      "season"=>"winter"
],
];

echo $fruits ["Mango"]["season"];
echo "</br>";
// exp 3
$Books = [
   [
   "title" => "Urdu",
   "pages" => 345,
   "author" =>[
      [
      "firstwriter" => "zaman pak",
      "secondwriter" => "husain khan"
      ]
   ]
   ],
   [
   "title"=> "Math",
   "pages"=> 256,
   "author" =>[
      [
      "firstwriter" => "Minza Abbas",
      "secondwriter" => "faral mehmmod"
      ]
  ],
   ]
];
      foreach($Books as $x => $info){
         foreach($info ["author"] as $value)
         
            echo $value["firstwriter"];
         };
       
         echo "</br>";   
         $fabric_stuff = array('lawn','linen','khadder','chefon','organza');
         $length = count($fabric_stuff);
     
         for($n = 0; $n < $length; $n++){
           echo $fabric_stuff[$n];
           echo '<br>';
         }           
      
     
   
?>




<!-- PHP uses three kinds of array:

Numeric array − An array with a numeric index. Values are stored and accessed in linear fashion.

Associative array − An array with strings as index. This stores element values in association with key values rather than in a strict linear index order.

Multidimensional array − An array containing one or more arrays and values are accessed using multiple indices. -->