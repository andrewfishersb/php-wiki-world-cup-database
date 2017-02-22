<?php
////$html = htmlentities(file_get_contents('https://en.wikipedia.org/wiki/2014_FIFA_World_Cup_squads'));
$html = file_get_contents('https://en.wikipedia.org/wiki/2014_FIFA_World_Cup_squads');
 preg_match_all('/<tr>(.*?)<\/tr>/s',$html,$matches);

//print_r($matches[2][1]);
//print_r($matches);
$players =array();


//izeof($matches[0]
for ($i=0;$i<=sizeof($matches[0]);$i++){
    if(strpos($matches[0][$i], 'aged') !== false){
        array_push($players,$matches[0][$i]);
    }
}


$counter=1;


foreach($players as $player){
    if($counter <23){
        echo $player . "<br>";
        $counter++;
    }else{
        echo $player . "<br><br>";
        $counter=1;
    }




}







