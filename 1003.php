<?php
function getInput()
{
    $f = fopen('data/1003.txt','r');
    $arr=[];
    while(!feof($f)){
        $arr[] = explode(PHP_EOL, fgets($f))[0];
    }
    fclose($f);
    return $arr;
}

function main()
{
    $arr = getInput();
    $s = "";
    $output = "";
    $outputlenIndex = $arr[0]+1;
    for($i=1;$arr[0]>=$i;$i++){
        $s=$s.$arr[$i]; 
    }
    for($j=1;$arr[$outputlenIndex]>=$j;$j++){
        $output =$output.$s[$arr[$outputlenIndex+$j]-1];
    }
    return $output;
}
var_dump(main());
