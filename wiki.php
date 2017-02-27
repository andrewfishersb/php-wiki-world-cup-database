<?php
include("player.php");

$html = file_get_contents('https://en.wikipedia.org/wiki/2014_FIFA_World_Cup_squads');
 preg_match_all('/<tr>(.*?)<\/tr>/s',$html,$matches);


$players =array();

$playerId=0;
for ($i=0;$i<=sizeof($matches[0]);$i++){


    //check that they are a player since all players have the word aged in their table data
    if(strpos($matches[0][$i], 'aged') !== false){


        //find the name in the th tag, if matched $name[0] hold the name placed <>here</> $name[1] will contain things such as what is in the tag ie styling
        preg_match('/<th(.*?)<\/th>/s',$matches[0][$i],$findName);

        // '/<td(.*?)\/td>/s' Use this to split up all other info data follows(see if different for captain = |0->number|1->position|2->age|3->apps|4->club/country(will need for extraction)
        //double array [0][x] x is the column i am taking from
        preg_match_all('/<td(.*?)<\/td>/s',$matches[0][$i],$playerData);

        //created to simplify the constructor, in the event of needing memory they can be discarded
        $name =  $findName[0];
        $age = $playerData[0][2];
        $nationality = "Brazil";
        $clubAndClubCountry = $playerData[0][4];

        array_push($players,new player($name,$age,$nationality,$clubAndClubCountry,$playerId));
        $playerId++;

    }
}

foreach ($players as $player){
    echo "My name is " .  $player->getName() . " I am " . $player->getAge() . " years old. I live in " . $player->getClubCountry() . " and I play for " . $player->getClub() . " and my ID is: " . $player->getPlayerId() ."<br>";

}
