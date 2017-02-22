<?php
$html = file_get_contents('https://en.wikipedia.org/wiki/2014_FIFA_World_Cup_squads');
 preg_match_all('/<tr>(.*?)<\/tr>/s',$html,$matches);

$players =array();

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


//maybe a php player class
//name, age?, nationality, team, country of team
//methods to extract each eventually