<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:26
 */


    /**
     * 
     * @param $val
     * @return TapVal
     */
    function tapval ($val) {
        
    }


    class TapVal {
        
        protected $mVal;
        
        public function __construct($val) {
            $this->mVal = $val;
        }

        
        public function assertIsStringArray (Exception $failEx=null) {
            return new TapStringArray();
        }
        
        
        public function assertIsArray (Exception $failEx=null) {
            return $this;
        }
        
        public function assertInstanceOf (Exception $failEx=null) {
            
        }
        
        public function assertIsString(Exception $failEx=null) {
            return new TapString();
        }
        
        public function assertIsInt (Exception $failEx=null)  {
            
        }
        
        public function assertIsBool (Exception $failEx=null) {
            
        }
        
        
        public function assertIsObject (Exception $failEx) {
            return new TapObject();
        }
        
        public function assertIsCallable (Exception $failEx=null) {
            return new TapCallable();
        }
        
        
        
        

    }