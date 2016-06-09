<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:58
 */

    class TapStringArray {



        public function push($value) {

        }
        
        
        public function getLength() {
            
        }
        
        
        public function translate (array $translations, Exception $failEx=null) {
            
        }
        
        
        
        
        
        public function implode ($delimiter) {
            return new TapString();
        }


        public function filterPreg ($regex, callable $filter=null) {
            return new TapStringArray();
        }


        public function filter(callable $fn) {
            return new TapStringArray();
        }

        
        public function first() {
            return new TapString();
        }
        
        
        public function each (callable $fn) {
            return new TapStringArray();
        }


    }