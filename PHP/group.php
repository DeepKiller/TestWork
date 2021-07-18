<?php

class Group{
    private $teams = [];
    private $name = "";

    function __construct(string $name, $group = null){
        $this->name = $name;
        if($group!=null){
            $this->teams = $group->teams;
        }
    }

    function addTeam($team){
        $this->teams[] = $team;
        return $this;
    }

    private function moveArray(){
        array_unshift($this->teams,array_pop($this->teams));
        $temp = $this->teams[0];
        $this->teams[0] = $this->teams[1];
        $this->teams[1] = $temp;
    }

    function generateCalendar(){
        $phantomTeam = "-1";
        $count = count($this->teams);
        if($count%2!=0){
            $this->addTeam(new Team($phantomTeam));
        }
        $count = count($this->teams);
        for ($i=1; $i<$count;$i++){
            print $this->name.(". Round ".$i)."<br>";
            foreach ($this->teams as $key => $team){
                if($key>=$count/2)
                    break;
                if($team->getName()!=$phantomTeam && $this->teams[$count-$key-1]->getName()!=$phantomTeam){
                    print ($this->teams[$key]->getNameAndCountry()." - ".$this->teams[$count-$key-1]->getNameAndCountry())."<br>";
                }
            }
            $this->moveArray();
            print "<br>";
        }
    }
}
?>