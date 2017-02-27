<?php

//OLD NAME CODE
//$name = strip_tags($findName[0]);
//if(strpos($name,"(c)")>0){
//    $name = substr($name,0,strpos($name,"(c)")-1);
//}
//echo $name;
//this concludes the get name portion


////age
//$ageString = strip_tags($playerData[0][2]);
//$posOfAged = strpos($ageString,"aged ");
//$substringAge = substr($ageString,$posOfAged+5,2);
//$age = (int) $substringAge;
////echo $age;


//$club = strip_tags($playerData[0][4]);
//if(strpos($club,"[")>0){
//    $club = substr($club,0,strpos($club,"["));
//}





////MAY JUST SPLIT THIS UP AND JUST USE THE STRIP TAG
//foreach ($titles as $title){
//        if(empty($country)){
//            $country = $title['title'];
//        }
//        else if(empty($club)){
//            //gets name
//            $clubName = $title['title'];
//
//            //check that only uses letters
////            if(!ctype_alpha($clubName)){//MAY NEED A DIFFERENT METHOD TO CHECK FOR OUR LETTERS
////                $club = $clubName;
////                echo "got here";
////            }else{
////                $club = strip_tags($playerData[0][4]);
////            }
//
//        }
//}

//club name
//echo strip_tags($playerData[0][4]); //this gets the club name -- look into pulling out the whole name SS Lazio for Klose


//echo $playerData[0][4];
//$doc = new DOMDocument();
//$doc->loadHTML($playerData[0][4]);
//$xml = simplexml_import_dom($doc);
//$titles =$xml->xpath('//a');
//
//$country = $titles[0]['title'];



//BELOW IS BACK UP CODE IF THE WHOLE LOOP DOESNT QUITE WORK OUT

//
//$html = file_get_contents('https://en.wikipedia.org/wiki/2014_FIFA_World_Cup_squads');
//preg_match_all('/<tr>(.*?)<\/tr>/s',$html,$matches);
//
//
//$players =array();
//
//$randomPlayer = new player();
//
//for ($i=0;$i<=sizeof($matches[0]);$i++){
//    $randomPlayer->setPlayerId($i);
//    if(strpos($matches[0][$i], 'aged') !== false){
//        array_push($players,$matches[0][$i]);
//    }
//}
//
//
//
////736 players
//$playerId = random_int(0,sizeof($players));
////$playerId = 71;
//
//
//
////find the name in the th tag, if matched $name[0] hold the name placed <>here</> $name[1] will contain things such as what is in the tag ie styling
//preg_match('/<th(.*?)<\/th>/s',$players[$playerId],$findName);
//
//$randomPlayer->setName($findName[0]);
//
//
//
//
//
//// '/<td(.*?)\/td>/s' Use this to split up all other info data follows(see if different for captain = |0->number|1->position|2->age|3->apps|4->club/country(will need for extraction)
////double array [0][x] x is the column i am taking from
//preg_match_all('/<td(.*?)<\/td>/s',$players[$playerId],$playerData);
//
//$randomPlayer->setAge($playerData[0][2]);
//$randomPlayer->setClubCountry($playerData[0][4]);
//$randomPlayer->setClub($playerData[0][4]);
//
//
//
//
//
//echo "My name is " .  $randomPlayer->getName() . " I am " . $randomPlayer->getAge() . " years old. I live in " . $randomPlayer->getClubCountry() . " and I play for " . $randomPlayer->getClub() . " and my ID is: " . $playerId;
//
//
//
//
//
////german national team
////for ($i=552;$i<575;$i++){
////    echo $i . '->>' . $players[$i];
////}
//
//
//
//
//
//
//
////foreach($players as $player){
////    if($counter <23){
////        echo $player . "<br>";
////        $counter++;
////    }else{
////        echo $player . "<br><br>";
////        $counter=1;
////    }
////}
//
//
////maybe a php player class
////name, age?, nationality, team, country of team
////methods to extract each eventually
//
//
