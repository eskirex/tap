<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:34
 */
namespace tap\type;

    use tap\type\group\TapValidKeyInterface;

    class TapInt extends AbstractTapVal implements TapValidKeyInterface{
        
        
        public function increment ($i=1) {
            
        }
        
        public function decrement ($i=1) {
            
        }
        
        public function assertBetween($min, $max) {
            
        }
        
        public function assertBiggerThan ($min) {
            
        }
        
        public function assertLowerThan ($max) {
            
        }
        
        public function assertEquals ($value) {
            
        }
        
        public function toFloat() {
            return new TapFloat();
        }
        
    }