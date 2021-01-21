<?php


class Druid extends Character
{
    public $forest = 0;

    public function stick(Character $target) {
        $attack = rand(5,15);
        if ($this->forest > 0)
        {
            $this->forest -= 1;
            $attack = $attack*1.5;
            $status = "$this->name attaque avec l'<strong style='color: green'>energie de la fôret </strong> {$target->name}! Il reste {$target->getLifePoints()} à {$target->name}!";
        }else {
            $status = "$this->name attaque {$target->name}! Il reste {$target->getLifePoints()} à {$target->name}!";
        }
        $target->setLifePoints($attack);
        return $status;
    }
    public function summon() {
        if ($this->forest == 0){
            $this->forest = 3;
            $status = "{$this->name} appelle l'énergie de la fôret.";
            return $status;
        }
    }
    public function attack(Character $target) {
        $rand = rand(1,10);
        if ($rand == 7){
            $this->lifePoints = 100;
            $status = "{$this->name} lance un sort de soin! Il retrouve tous ses point de vie ({$this->getLifePoints()})!";
            return $status;
        }elseif ($rand < 7 || $this->forest > 0){
            return $this->stick($target);
        }elseif ($rand > 7 && $this->forest == 0){
            return $this->summon();
        }
    }


}