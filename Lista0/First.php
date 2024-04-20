<?php

function densityFunction($t, $c) {
    if ($t >= 0 && $t <= 1) {
        return $c * $t;
    } else {
        return 0;
    }
}

function cumulativeDistributionFunction($t, $c) {
    if ($t >= 0 && $t <= 1) {
        return ($c * $t**2) / 2;
    } else {
        return 0;
    }
}

function numericalIntegration($start, $end, $c, $step = 0.0001) {
    $sum = 0;
    for ($t = $start; $t <= $end; $t += $step) {
        $sum += densityFunction($t, $c) * $step;
    }
    return $sum;
}

$c = 2;

$probability_numerical = numericalIntegration(0.5, 1, $c);

$probability_cumulative = 1 - cumulativeDistributionFunction(0.5, $c);

echo "P(X > 0.5) obliczone za pomocą całkowania numerycznego: " . $probability_numerical . "\n";
echo "P(X > 0.5) obliczone za pomocą funkcji dystrybuanty: " . $probability_cumulative . "\n";

?>
