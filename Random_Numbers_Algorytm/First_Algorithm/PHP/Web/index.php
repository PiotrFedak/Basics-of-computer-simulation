<?php

function generatePoints() {
    $points = [];
    $stop=0;
    $Xo=1;
    $a=2;
    $m=10000;
    $modulo=0;
    $x=0;
    do{
        $x=$Xo*$a;
        if($x<$m){
            foreach($points as $point){
               if($point[0]==$x && $point[1]==$m){
                $stop=1;
               }
            }
            if($stop!==1){
            $points[]= [$x,$m];
            $Xo=$x;
            }
        }
        if($x>$m){
            $modulo=$x%$m;
            $x=$modulo;
            foreach($points as $point){
                if($point[0]==$x && $point[1]==$m){
                 $stop=1;
                }
             }
             if($stop!==1){
             $points[]= [$x,$m];
             $Xo=$x;
             }
        }
    }while($stop!==1);
    return $points;
}

$points = generatePoints();

// Znalezienie maksymalnych wartości punktów
$maxX = max(array_column($points, 0));
$maxY = max(array_column($points, 1));

// Określenie maksymalnej wartości dla skalowania
$maxValue = max($maxX, $maxY);

$imageWidth = 400;
$imageHeight = 400;
$image = imagecreatetruecolor($imageWidth, $imageHeight);
$backgroundColor = imagecolorallocate($image, 0, 0, 0);
$pointColor = imagecolorallocate($image, 255, 255, 255); 
$axisColor = imagecolorallocate($image, 128, 128, 128); // Kolor osi

// Rysowanie punktów
foreach ($points as $point) {
    // Skalowanie punktów
    $scaledX = $point[0] / $maxValue * $imageWidth;
    $scaledY = $imageHeight - ($point[1] / $maxValue * $imageHeight);
    
    // Rysowanie punktu
    imagesetpixel($image, $scaledX, $scaledY, $pointColor);
}

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);

?>