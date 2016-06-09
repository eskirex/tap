<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 04:28
 */

    namespace tap\exception;
    
   

    class TapKeyMissingException extends TapException {
        private $mMissingKey;
        
        public function __construct($message, $code, $missingKey, \Exception $previous=null) {
            parent::__construct($message, $code, $previous);
            $this->mMissingKey = $missingKey;
        }
        
        public function getMissingKey() {
            return $this->mMissingKey;
        }

    }