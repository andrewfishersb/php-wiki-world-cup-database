<?php

class player
{
    var $name;
    var $age;
    var $nationality;
    var $club;
    var $clubCountry;



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
    public function setName($name)
    {
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
     * @param mixed $age
     */
    public function setAge($age)
    {
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
    public function setClub($club)
    {
        $this->club = $club;
    }

    /**
     * @return mixed
     */

    //flagicon
    public function getClubCountry()
    {
        return $this->clubCountry;
    }

    /**
     * @param mixed $clubCountry
     */
    public function setClubCountry($clubCountry)
    {
        $this->clubCountry = $clubCountry;
    }
}