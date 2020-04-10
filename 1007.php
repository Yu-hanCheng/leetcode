<?php
//1007

function getInput()
{
    $f = fopen('data/1007.txt','r');
    $cnt = fgets($f);
    $data= [];
    $arrName = [];
    $arrNum = [];
    while(!feof($f)){
        $data[] = explode(PHP_EOL, fgets($f))[0];
    }
    fclose($f);
    
    array_pop($data);
    foreach($data as $value){ 
        [$name,$num] = explode(' ', $value);
        $arrName[] = $name;
        $arrNum[] = $num;
    }
    return [$arrName, $arrNum];
}
function findMax($nums)
{
    $maxIndex = 0;
    $indexs = [];
    $max = 0;
    foreach($nums as $key => $num){
        if($num > $max){
            $max = $num;
            $maxIndex = $key;
            $indexs = [];
        }
        if($num == $max){
            $indexs[] = $key;
        }
    }
    return [$maxIndex, $indexs, $max];
}
function main()
{
    [$arrName, $arrNum] = getInput();
    [$index, $indexs, $max] = findMax($arrNum);
    $nameList = [];
    if(count($indexs)>0){
        foreach($indexs as $val){
            $nameList[] = $arrName[$val];
        }
    }
    return $nameList;
}

var_dump(main());
