<?php

class Funcionesmatematicas {

   function Correlation($arr1, $arr2)
{       
    $correlation = 0;
   
    $k = $this->SumProductMeanDeviation($arr1, $arr2);
    $ssmd1 = $this->SumSquareMeanDeviation($arr1);
    $ssmd2 = $this->SumSquareMeanDeviation($arr2);
   
    $product = $ssmd1 * $ssmd2;
   
    $res = sqrt($product);
   
    $correlation = $k / $res;
   
    return $correlation;
}

function SumProductMeanDeviation($arr1, $arr2)
{
    $sum = 0;
   
    $num = count($arr1);
   
    for($i=0; $i<$num; $i++)
    {
        $sum = $sum + $this->ProductMeanDeviation($arr1, $arr2, $i);
    }
   
    return $sum;
}

function ProductMeanDeviation($arr1, $arr2, $item)
{
    return ($this->MeanDeviation($arr1, $item) * $this->MeanDeviation($arr2, $item));
}

function SumSquareMeanDeviation($arr)
{
    $sum = 0;
   
    $num = count($arr);
   
    for($i=0; $i<$num; $i++)
    {
        $sum = $sum + $this->SquareMeanDeviation($arr, $i);
    }
   
    return $sum;
}

function SquareMeanDeviation($arr, $item)
{
    return $this->MeanDeviation($arr, $item) * $this->MeanDeviation($arr, $item);
}

function SumMeanDeviation($arr)
{
    $sum = 0;
   
    $num = count($arr);
   
    for($i=0; $i<$num; $i++)
    {
        $sum = $sum + $this->MeanDeviation($arr, $i);
    }
   
    return $sum;
}

function MeanDeviation($arr, $item)
{
    $average = $this->Average($arr);
   
    return $arr[$item] - $average;
}   

function Average($arr)
{
    $sum = $this->Sum($arr);
    $num = count($arr);
   
    return $sum/$num;
}

function Sum($arr)
{
    return array_sum($arr);
}

function GetSlope($x, $y)
{
     
            $n = count($x);
            $sumxy = 0;
            $sumx = 0;
            $sumy = 0;
            $sumx2 = 0;
            
            for ($i = 0; $i < count($x); $i++)
            {
                $sumxy += $x[$i] * $y[$i];
                $sumx += $x[$i];
                $sumy += $y[$i];
                $sumx2 += $x[$i] * $x[$i];
            }
            $slope = ($sumxy - $sumx * $sumy / $n) / ($sumx2 - $sumx * $sumx / $n);
            return (round($slope,2,PHP_ROUND_HALF_DOWN));
}



function Intercept($x, $y)
{
     
            $n = count($x);
            $asumx = 0;
            $asumy = 0;
            $slope = $this->GetSlope($x, $y);
            $intercept = 0;
            
            
            for ($i = 0; $i < count($x); $i++)
            {
                $asumx += round($x[$i], 2);
                $asumy += round($y[$i],2);

            }
            $asumx = $asumx/$n;
            $asumy = $asumy/$n;
            $intercept = $asumy - ($slope*$asumx);
            
            return (round($intercept,2,PHP_ROUND_HALF_DOWN));
}
//calcula la diferencia entre fechas
function date_diff($d1, $d2){
    $d1 = (is_string($d1) ? strtotime($d1) : $d1);
    $d2 = (is_string($d2) ? strtotime($d2) : $d2);

    $diff_secs = abs($d1 - $d2);
    $base_year = min(date("Y", $d1), date("Y", $d2));

    $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
    return array(
        "years" => date("Y", $diff) - $base_year,
        "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
        "months" => date("n", $diff) - 1,
        "days_total" => floor($diff_secs / (3600 * 24)),
        "days" => date("j", $diff) - 1,
        "hours_total" => floor($diff_secs / 3600),
        "hours" => date("G", $diff),
        "minutes_total" => floor($diff_secs / 60),
        "minutes" => (int) date("i", $diff),
        "seconds_total" => $diff_secs,
        "seconds" => (int) date("s", $diff)
    );
}

}


?>
