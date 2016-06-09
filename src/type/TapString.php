<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:31
 */

namespace tap\type;


    use tap\type\group\TapValidKeyInterface;

    class TapString extends AbstractTapVal implements TapValidKeyInterface {


        /**
         * @param $delimiter
         * @return TapStringArray
         */
        public function explode($delimiter) {
            return new TapStringArray();
        }

        
        public function assertPregMatch($regex, Exception $failEx=null) {
            
            return $this;
        }
        
        public function assertStartsWith ($str, Exception $failEx=null) {
            return $this;
        }
        
        public function assertEndsWith ($str, Exception $failEx=null) {
            return $this;
        }
        
        public function assertEMailAddress (Exception $failEx=null) {
            
        }
        
        
        
        
        
        
        public function pregReplace ($regex, $replacement) {
            
        }
        
        public function pregReplaceCallback ($regex, callable $cb) {
            
        }
        
        public function substr ($start, $length=null) {
            
        }
        
        


        /**
         * Übersetzt werte in neue Werte:
         * 
         * [A => "Wert A", "B" => "Wert B"]
         * 
         * @param array $translation
         * @param Exception|null $failEx
         */
        public function translate(array $translation, Exception $failEx=null) {
            
        }
        
        
        public function toDate() {
            return new TapDate();
        }
        

        /**
         * @return TapInt
         */
        public function toInt() {
            return new TapInt();
        }

        /**
         * @return TapUri
         */
        public function toUri() {
            return new TapUri();
        }
        
    }