<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:55
 */

    namespace tap\exception;
    
    
    class TapValueCastingException extends TapException {
        
        private $mFailedValue;
        
        public function __construct($message, $code, $failedValue, \Exception $previous=null) {
            $message = str_replace("?", "'$failedValue'", $message);
            parent::__construct($message, $code, $previous);
            $this->mFailedValue = $failedValue;
        }
        
        public function getFailedValue() {
            return $this->mFailedValue;
        }




    }