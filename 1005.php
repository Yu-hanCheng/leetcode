<?php
function getInput()
{
    $arr=[];
    $f = fopen('data/1005.txt','r');
    while(!feof($f)){
        $number = explode(PHP_EOL, fgets($f))[0];
        if($number == 0){
            break;
        }
        $arr[]=$number;
    }
    fclose($f);
    return $arr;
}


function main($arr)
{
    $output = [];
    for($i=0;count($arr)>$i;$i++){
        $a = sum($arr[$i]);
        $b = sum($a);
        if($arr[$i]==$b){
            $output[] = $a;
        }else{
            $output[] = 'QQ';
        }
    }   
    return $output;
}

function sum($input)
{
    $factors = findFactors($input);
    if(count($factors)==0){
        return 0;
    }
    $multiplication = 1;
    foreach($factors as $key => $value){
        $keySum = 1;
        for($value;$value>0;$value--)
        {
           $keySum += $key**$value;
        }
        $multiplication  *= $keySum;
    }
    return $multiplication - $input;
}

function findFactors($input)
{
    $quotient = $input;
    $factors = [];
    for($divisor = 2; $divisor < $input; $divisor++)
    {
        if($quotient > 1){
            $cnt = 0;
            [$quotient, $remainder] = gmp_div_qr($quotient, $divisor);
            while($remainder == 0){
                $cnt++;
                [$quotient, $remainder] = gmp_div_qr($quotient, $divisor);
            }
            $quotient = $quotient * $divisor + $remainder; 
 
            if($cnt>0){
                $factors[$divisor] = $cnt;
            }
        }else{
            break;
        }
    }
    return $factors;
}
var_dump(main(getInput()));
