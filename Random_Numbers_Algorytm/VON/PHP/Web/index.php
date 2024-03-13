<?php

function generatePoints() {
    $points = [];
    $stop =0;
    $Xo=12;
    $m=2;
    do{
        $y=pow($Xo,2);
        $length = strlen((string)abs($y));
        $desireLenght=2*$m;
        if($length != $desireLenght){
            $numberString = str_pad($y, max($desireLenght, strlen((string)$y)), '0', STR_PAD_LEFT);
        }
        if($length == $desireLenght){
            $numberString=strval($y);
        }
        $middleIndex = floor($length / 2);
        $halfDesiredLength = $m / 2; 
        $startIndex = $middleIndex - $halfDesiredLength;
        $endIndex = $middleIndex + $halfDesiredLength - 1;
        $middleDigits = substr($numberString, $startIndex, $endIndex - $startIndex + 1);
        $int = intval($middleDigits);
            foreach($points as $point){
               if($point[0]==$int){
                $stop=1;
               }
            }
            if($stop!==1){
            $points[]= [$int,$int];
            $Xo=$int;
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

$fileName = "obrazek.png";
imagepng($image, $fileName);

// Usunięcie obiektu obrazu
imagedestroy($image);

?>