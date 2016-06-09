<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 03:12
 */

    namespace tap\type;


    class TapStringMap extends AbstractTapVal {


        /**
         * @return TapString
         */
        public function asQueryString () {
            return new TapString(http_build_query($this->val));
        }

        
        
        public function asArray($name) {
            return new TapStringArray();
        }

        


        public function asString($name, $default=null) {
            
        }
        
        public function asInt($name, $default=null) {
            
        }
        
        public function asDate($name, $default=null) {
            
        }
        
        public function asFloat ($name, $default=null) {
            
        }
        
        public function asBool ($name, $default) {
            
        }
        
        
        public function get($name, $default=null) {
            return new TapString();
        }
        
        public function set($name, $value) {
            return $this;
        }
        
        public function exists($name) {
            
        }
        
        public function delete($name) {
            
        }
        
        
    }