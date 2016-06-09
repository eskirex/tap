<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 04:17
 */

    namespace tap\map;
    
    
    use tap\exception\TapInvalidKeyException;
    use tap\exception\TapKeyMissingException;
    use tap\TapVal;
    use tap\type\AbstractTapVal;
    use tap\type\group\TapValidKeyInterface;
    use tap\type\TapInt;
    use tap\type\TapString;

    class TapMap extends AbstractTapVal {
        
        
        protected function _tranlateKey ($input) {
            if ( is_object($input)) {
                if ( ! $input instanceof TapValidKeyInterface)
                    throw new TapInvalidKeyException("Object Key of type " . gettype($input). " not allowed", 2, $input);
                $input = $input->val();
            }
            if ( ! is_int($input) && ! is_float($input) && ! is_string($input))
                throw new TapInvalidKeyException("Key of type " . gettype($input) . "not allowed", 1, $input);
            return $input;
        }
        
        
        public function reduce (callable $function) {
            
        }

        /**
         * @param $key
         * @param null $default
         * @param \Exception|null $failEx
         */
        public function get($key, $default=null, \Exception $failEx=null) {
            $key = $this->_tranlateKey($key);
            if ( ! isset ($this->val[$key])) {
                if ($default !== null)
                    return new TapVal($default);
                if ($failEx === null)
                    $failEx = new TapKeyMissingException("Missing key ?", 1, $key);
                throw $failEx;
            }
            return new TapVal($this->val[$key]);
        }

        /**
         * @param $key
         * @param $value
         * @return $this
         */
        public function set($key, $value) {
            $key = $this->_tranlateKey($key);
            $this->val[$key] = $value;
            return $this;
        }

        /**
         * @return bool
         */
        public function isEmpty () {
            return empty($this->val);
        }
        
        /**
         * @param $key
         * @param $value
         * @return $this
         */
        public function push($key, $value) {
            $key = $this->_tranlateKey($key);
            if ( ! isset($this->val[$key]))
                $this->val[$key] = [$value];


            return $this;
        }

    }