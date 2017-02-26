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

//736 players

$randomPlayerId = 58;//random_int(0,sizeof($players));


//find the name in the th tag, if matched $name[0] hold the name placed <>here</> $name[1] will contain things such as what is in the tag ie styling
preg_match('/<th(.*?)<\/th>/s',$players[58],$findName);
$name = strip_tags($findName[0]);
if(strpos($name,"(c)")>0){
    $name = substr($name,0,strpos($name,"(c)")-1);
}
//echo $name;
//this concludes the get name portion





// '/<td(.*?)\/td>/s' Use this to split up all other info data follows(see if different for captain = |0->number|1->position|2->age|3->apps|4->club/country(will need for extraction)
//double array [0][x] x is the column i am taking from

preg_match_all('/<td(.*?)<\/td>/s',$players[58],$playerData);


//for ($i =0;$i<sizeof($playerData[0]);$i++){
//    echo $playerData[0][$i];
//}


//age
$ageString = strip_tags($playerData[0][2]);
$posOfAged = strpos($ageString,"aged ");
$substringAge = substr($ageString,$posOfAged+5,2);
$age = (int) $substringAge;
//echo $age;




//club name
//echo strip_tags($playerData[0][4]); //this gets the club name -- look into pulling out the whole name SS Lazio for Klose


//echo $playerData[0][4];
$doc = new DOMDocument();
$doc->loadHTML($playerData[0][4]);
$xml = simplexml_import_dom($doc);
$titles =$xml->xpath('//a');

$club="";
$country="";
foreach ($titles as $title){
    if(strpos($title['href'],"#")!==true){
        if(empty($country)){
            $country = $title['title'];
        }else{
            $club = $title['title'];
        }
    }

}


echo "My name is " . $name . " I am " . $age . " years old. I live in " . $country . " and I play for " . $club . " and my ID is: " . $randomPlayerId;





//german national team
//for ($i=552;$i<575;$i++){
//    echo $i . '->>' . $players[$i];
//}








//foreach($players as $player){
//    if($counter <23){
//        echo $player . "<br>";
//        $counter++;
//    }else{
//        echo $player . "<br><br>";
//        $counter=1;
//    }
//}


//maybe a php player class
//name, age?, nationality, team, country of team
//methods to extract each eventually