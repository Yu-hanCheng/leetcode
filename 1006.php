<?php
function getInput()
{
    $arr=[];
    $f = fopen('data/1006.txt','r');
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
    $allSeats = $arr[0]*3/2 -2;
    $end = count($arr)-1;
    $allban = 3*($end-1);
    $covers = cutSum($arr, $end);
    $noban = outside($arr, $end);
    return $allSeats - ($allban-$covers-$noban);
}

function cutSum($arr, $end)
{
    $cover = 0;
    for($i=2;$end>$i;$i++){
        if($arr[$i]%2==0){
            if(($arr[$i+1]-$arr[$i])==2){
                $cover++;
            }
            if($i<$end-1){
                if(($arr[$i+2]-$arr[$i])==2){
                    $cover++;
                }
            }
        }else{
            if(($arr[$i+1]-$arr[$i])==2 or ($arr[$i+1]-$arr[$i])==1){
                $cover++;
            }
            if($i<$end-1){
                if(($arr[$i+2]-$arr[$i])==2){
                    $cover++;
                }
            }
        }
    }   
    return $cover;
}

function outside($arr, $end)
{
    $noSide = 0;
    $all = $arr[0];
    if($arr[0]<5){
        foreach(array_slice($arr,2) as $num){
            if($num == 1 or $num ==2 or $num==$arr[0] or $num==$arr[0]-1){
                $noSide++;
            }   
        }
    }else{
        if($arr[2]==1 or $arr[2]==2){
            $noSide++;
        }
        if($arr[3]==2){
            $noSide++;
        }
        if($arr[$end]==$all or $arr[$end]==$all-1){
            $noSide++;
        }
        if($arr[$end-1]==$all-1){
            $noSide++;
        }
    }
    return $noSide;
}
$input = getInput();
var_dump(main($input));
