<?php
include_once('IFighter.class.php');

    class NightsWatch implements IFighter
    {
        private $fighter = array();
        public function recruit($perso)
        {
            $this->fighter[] = $perso;
        }
        public function fight()
        {
            foreach ($this->fighter as $personnage)
            {
                if ($personnage instanceof IFighter)
                    $personnage->fight();
            }
        }

    }
 ?>
