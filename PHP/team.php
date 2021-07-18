<?php
class Team{
    private $country = "";
    private $name = "";

    function __construct(string $name){
        $this->name = $name;
        return $this;
    }

    function setCountry(string $country){
        $this->country = $country;
        return $this;
    }
    
    function getNameAndCountry(){
        if($this->country != ""){
            return $this->getName()." (".$this->country.")";
        }else{
            return $this->getName();
        }
    }
    function getName(){
        return $this->name;
    }
}
?>