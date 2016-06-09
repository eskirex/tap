<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:51
 */


    class TapAssertionException extends Exception {

        private $mActualValue;

        public function __construct($message, $code, $failedValue, $previous) {
            parent::__construct($message, $code, $previous);
            $this->mActualValue = $failedValue;
        }

        public function getFailedValue () {
            return $this->mActualValue;
        }

    }