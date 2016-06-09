<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:55
 */

    class TapValueCastingException extends Exception {
        
        private $mMissingKey;
        
        public function __construct($message, $code, $missingKey, Exception $previous=null) {
            parent::__construct($message, $code, $previous);
            $this->mMissingKey = $missingKey;
        }
        
        public function getMissingKey() {
            return $this->mMissingKey;
        }

    }