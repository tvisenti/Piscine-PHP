<?php

    class UnholyFactory {

        private $army = array();

        public function absorb($warrior)
        {
            $not_double = true;
            if (get_parent_class($warrior) == "Fighter")
            {
                foreach ($this->army as $soldier)
                {
                    if ($soldier instanceof $warrior)
                    {
                        print ('(Factory already absorbed a fighter of type ' . $soldier->name . ')' . PHP_EOL);
                        $not_double = false;
                        break ;
                    }
                }
                if ($not_double)
                {
                    $this->army[] = $warrior;
                    print ('(Factory absorbed a fighter of type ' . $warrior->name . ')' . PHP_EOL);
                }
            }
            else
                print ('(Factory can\'t absorb this, it\'s not a fighter)' . PHP_EOL);
        }

        public function fabricate($fighters)
        {
            foreach ($this->army as $soldier)
            {
                if ($soldier->name == $fighters)
                {
                    print ('(Factory fabricates a fighter of type ' . $fighters . ')' . PHP_EOL);
                    return $soldier;
                }
            }
            print ('(Factory hasn\'t absorbed any fighter of type ' . $fighters . ')' . PHP_EOL);
            return null;
        }

    }

 ?>
