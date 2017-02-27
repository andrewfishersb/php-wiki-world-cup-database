<?php
//include("player.php");
include("player.php");

//two attemps. One is to have everything in one big loop and add the object at the end into an array. or 2. Read in all the players, then format and create objects

$html = file_get_contents('https://en.wikipedia.org/wiki/2014_FIFA_World_Cup_squads');
 preg_match_all('/<tr>(.*?)<\/tr>/s',$html,$matches);


$players =array();

//$randomPlayer = new player();
$playerId=0;
for ($i=0;$i<=sizeof($matches[0]);$i++){


    //check that they are a player since all players have the word aged in their table data
    if(strpos($matches[0][$i], 'aged') !== false){


        //find the name in the th tag, if matched $name[0] hold the name placed <>here</> $name[1] will contain things such as what is in the tag ie styling
        preg_match('/<th(.*?)<\/th>/s',$matches[0][$i],$findName);
//        $randomPlayer->setName($findName[0]);


        // '/<td(.*?)\/td>/s' Use this to split up all other info data follows(see if different for captain = |0->number|1->position|2->age|3->apps|4->club/country(will need for extraction)
        //double array [0][x] x is the column i am taking from
        preg_match_all('/<td(.*?)<\/td>/s',$matches[0][$i],$playerData);


//        $randomPlayer->setAge();
//        $randomPlayer->setClubCountry($playerData[0][4]);
//        $randomPlayer->setClub();

        $name =  $findName[0];
        $age = $playerData[0][2];
        $nationality = "Brazil";
        $clubAndClubCountry = $playerData[0][4];



        array_push($players,new player($name,$age,$nationality,$clubAndClubCountry,$playerId));
//        array_push($players,new player("Andrew",25,"British American","Portland", "Portland FC",$playerId));
        $playerId++;

    }
}

foreach ($players as $player){
    echo "My name is " .  $player->getName() . " I am " . $player->getAge() . " years old. I live in " . $player->getClubCountry() . " and I play for " . $player->getClub() . " and my ID is: " . $player->getPlayerId() ."<br>";

}


//echo $players[0]->getName();
//echo sizeof($players);
//echo $players[0]->getName();
//echo $players[0]->getAge();
//echo $players[0]->getNationality();
//echo $players[0]->getClub();
//echo $players[0]->getClubCountry();
//echo $players[0]->getPlayerId();
//print_r($players[0]);
//echo "<br>" . $players[0]->getName();
//echo "<br>" . $players[0]->get();
//echo "<br>" . $players[0]->getName();
//echo "<br>" . $players[0]->getName();
//echo "<br>" . $players[0]->getName();



//736 players
//$playerId = random_int(0,sizeof($players));
//$playerId = 71;

//
////Back up in case of a constructor failing
//$randomPlayer->setPlayerId($i);
//
////find the name in the th tag, if matched $name[0] hold the name placed <>here</> $name[1] will contain things such as what is in the tag ie styling
//preg_match('/<th(.*?)<\/th>/s',$matches[0][$i],$findName);
//$randomPlayer->setName($findName[0]);
//
//
//// '/<td(.*?)\/td>/s' Use this to split up all other info data follows(see if different for captain = |0->number|1->position|2->age|3->apps|4->club/country(will need for extraction)
////double array [0][x] x is the column i am taking from
//preg_match_all('/<td(.*?)<\/td>/s',$matches[0][$i],$playerData);
//
//$randomPlayer->setAge($playerData[0][2]);
//$randomPlayer->setClubCountry($playerData[0][4]);
//$randomPlayer->setClub($playerData[0][4]);



















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


