<?php

/**
 * Created by PhpStorm.
 * User: andrewfisher
 * Date: 2/27/17
 * Time: 11:48 AM
 */
class player
{
    private $name;
    private $age;
    private $nationality;
    private $club;
    private $clubCountry;
    private $playerId;

    /**
     * player2 constructor.
     * @param $name
     * @param $age
     * @param $nationality
     * @param $club
     * @param $clubCountry
     * @param $playerId
     */
//     function __construct($name, $age, $nationality, $club, $clubCountry, $playerId)
//    {
//        $this->setName($name);
//        $this->setAge($age);
//        $this->setNationality($nationality);
//        $this->setClub($club);
//        $this->setClubCountry($clubCountry);
//        $this->playerId = $playerId;
//    }
    function __construct($name,$age,$nationality,$clubAndCountry,$playerId){
        $this->setName($name);
        $this->setAge($age);
        $this->setNationality($nationality);
        $this->setClub($clubAndCountry);
        $this->setClubCountry($clubAndCountry);
        $this->setPlayerId($playerId);
//        $this->name = $name;
//        $this->age=$age;
//        $this->nationality=$nationality;
//        $this->club= $clubAndCountry;
//        $this->clubCountry = $clubAndCountry;
//        $this->playerId= $playerId;
    }

    //will send in the player and it will take their html and extract that specific information
    /**
     * @return mixed
     */


    //  th tag while the others dont
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($playerName)
    {

        //ALSO CHECK FOR [] Edder Delgado[97] Honduras

        $name = strip_tags($playerName);
        if(strpos($name,"(c)")>0){
            $name = substr($name,0,strpos($name,"(c)")-1);
        }

        $this->name = $name;
    }

    /**
     * @return mixed
     */

    //aged
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Clearly coverts (aged 25) to 25. Could have made a more compact method but it would have made a long mess
     * @param mixed $age
     */
    public function setAge($playerAge)
    {
        $ageString = strip_tags($playerAge);
        $posOfAged = strpos($ageString,"aged ");
        $substringAge = substr($ageString,$posOfAged+5,2);
        $age = (int) $substringAge;
        $this->age = $age;
    }

    /**
     * @return mixed
     */

    //will set up a list of countries involved and when added 23 will switch to the next country s
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {


        //an array of all the countries, force the array to be size of 32 ( can change depending on the world cup/euro size) loop through
        //<li class="toclevel-2 tocsection-2"><a href="#Brazil"><span class="tocnumber">1.1</span> <span class="toctext">Brazil</span></a></li>
        //check that it does not contain the word Group. Before it gets to the other headers the array limit should stop it, then during the final looping
        //count to 23, afterwards switch to the next index...
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */

    //get last title of player
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($playerClub)
    {
        $club = strip_tags($playerClub);

        if(strpos($club,"[")>0){
            $club = substr($club,0,strpos($club,"["));
        }

        $this->club = $club;
    }

    /**
     * @return mixed
     */

    public function getClubCountry()
    {
        return $this->clubCountry;
    }

    /**
     * @param mixed $clubCountry
     */
    public function setClubCountry($playerClubCountry)
    {
//MIGHT BE ABLE TO SIMPLIFY
        $doc = new DOMDocument();
        $doc->loadHTML($playerClubCountry);
        $xml = simplexml_import_dom($doc);
        $titles =$xml->xpath('//a');

        $clubCountry = $titles[0]['title'];


        $this->clubCountry = $clubCountry;
    }


    /**
     * @return mixed
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * @param mixed $playerId
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;
    }

}