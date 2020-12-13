<?php 
    class Features  
    {
        public $Feature ;
        public  int $DevHours ;
        public int $TestHours ;
        

        public function __get($attr)
        {
            return $this->$attr;
        }
        public function __set($attr, $value)
        {
            $this ->$attr = $value ;
            return $this;
        }

    }
    