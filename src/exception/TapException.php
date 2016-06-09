<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 04:29
 */

    namespace tap\exception;
    
    class TapException extends \Exception {

        protected $value;

        protected $messageTpl;

        public function __construct($messageTpl, $code, $value=null, \Exception $previous=null) {
            $message = str_replace("?", $value, $messageTpl);
            parent::__construct($message, $code, $previous);
            $this->value = $value;
            $this->messageTpl = $messageTpl;
        }

        public function getTriggerValue () {
            return $this->value;
        }

    }