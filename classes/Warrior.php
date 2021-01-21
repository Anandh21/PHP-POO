<?php 

class Warrior extends Character
{
    private $boost = False;

    public function attack(Character $target) {
        $rand = rand(1, 10);
        if ($rand <= 8 || $this->boost) {
            return $this->sword($target);
        } else if ($rand > 8) {
            return $this->boost();
        }
    }

    private function sword(Character $target) {
        $attack = rand(5, 15);
        if ($this->boost) {
            $rand = rand(17, 30);
            $rand /= 10;
            $attack *= $rand;
            $this->boost = False;
            $status = "$this->name attaque avec <strong style='color: red'>Rage</strong> {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";

        }else{
            $status = "$this->name attaque {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";

        }
        $target->setLifePoints($attack);
        return $status;
    }
    private function boost() {
        $this->boost = True;
        $status = "{$this->name} se concentre pour taper plus fort!";
        return $status;
    }
}