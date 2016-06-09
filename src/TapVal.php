<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:26
 */

    namespace tap;
    use tap\type\AbstractTapVal;
    use tap\type\TapString;

    /**
     * 
     * @param $val
     * @return TapVal
     */
    function tapval ($val) {
        
    }


    class TapVal extends AbstractTapVal{
        
        
        public function assertIsStringArray (\Exception $failEx=null) {
            return new TapStringArray();
        }
        
        
        public function assertIsArray (\Exception $failEx=null) {
            return $this;
        }
        
        public function assertInstanceOf (\Exception $failEx=null) {
            
        }

        /**
         * @param \Exception|null $failEx
         * @return TapString
         */
        public function assertIsString(\Exception $failEx=null) {
            if ( ! is_string($this->val)) {
                
            }
            return new TapString($this->val);
        }
        
        public function assertIsInt (\Exception $failEx=null)  {
            
        }
        
        public function assertIsBool (\Exception $failEx=null) {
            
        }
        
        
        public function assertIsObject (\Exception $failEx) {
            return new TapObject();
        }
        
        public function assertIsCallable (\Exception $failEx=null) {
            return new TapCallable();
        }
        
        
        
        

    }