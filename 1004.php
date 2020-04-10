<?php
function getInput()
{
    $arr=[];
    $f = fopen('data/1004.txt','r');
    while(!feof($f)){
        $arr[] = explode(PHP_EOL, fgets($f))[0];
    }
    fclose($f);
    return $arr;
}
function game($arr)
{
    $s = "";
    $output = [];
    $rounds = $arr[0];

    for($i=1;$arr[0]>=$i;$i++){
       $s=explode(' ',$arr[$i]); 
        if($s[0]==$s[1]){
            $output[] = 'DRAW';
            continue;
        }
        if($s[2]>0){
            if($s[0]<$s[1]){
                $output[] = 'B';
            }else{
                $output[] = 'A';
            }
        }else{
            if($s[0]<$s[1]){
                $output[] = 'A';
            }else{
                $output[] = 'B';
            }
        }
    }
    return $output;
}
function main()
{
    $arr = getInput();
    return game($arr); 
}
var_dump(main());

