<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 03:20
 */

    class TapBool {


        public function isTrue() {

        }

        public function isFalse() {

        }

        public function assertTrue ($message="", $code="") {

        }

        public function assertFalse($message="", $code="") {

        }

        public function toInt($castFalse=0, $castTrue=1) {
            return new TapInt();
        }

        public function toString($castFalse="false", $castTrue="true") {
            return new TapString();
        }



    }