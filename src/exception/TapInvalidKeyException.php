<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 04:40
 */

    namespace tap\exception;

    class TapInvalidKeyException extends TapException {

        private $mOrigKey;

        public function __construct($message, $code, $origKey, \Exception $previous=null) {
            parent::__construct($message, $code, $previous);
            $this->mOrigKey = $origKey;
        }

        public function getOrigKey () {
            return $this->mOrigKey;
        }

    }