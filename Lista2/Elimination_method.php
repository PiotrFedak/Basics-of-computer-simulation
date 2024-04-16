
<?php

function generatePoints() {
        $points = [];
        $stop =0;
        $Xo=1621;
        $m=4;
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
            $middleIndex = floor($desireLenght / 2);
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
                $points[]= [$int];
                $Xo=$int;
                }
           
        }while($stop!==1);
        return $points;
    }


    $points = generatePoints();
    $suma=0;
    $all=0;
    $max=0;
    $lib=[];
    $table=0;

foreach ($points as $point) {
    if($point[0]>$max){
        $max=$point[0];
    }
}
foreach ($points as $point) {
    $lib[]=$point[0]/$max;  
}

$lenght=count($lib);

$przebieg=0;

do{
    $ax=random_int(0,$lenght-1);
    $bx=random_int(0,$lenght-1);
    $a=$lib[$ax];
    $b=$lib[$bx];
    $operation=pow(1-$a,3)*((256/27)*$a);
    echo $a." ".$b." ".$operation."\n ";
   $przebieg++;
    if($b<=$operation){
        $table=$a;
    }

}while( $table==0);

    echo $table."  przy ".$przebieg." próbach \n";



