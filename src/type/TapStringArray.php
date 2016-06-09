<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:58
 */

namespace tap\type;


    class TapStringArray extends AbstractTapVal {


        public function push($value) {
            if ($value instanceof TapStringArray) {
                $value->each(function (TapString $val) {
                    $this->val[] = $val->val();
                });
                return $this;
            }
            
            $this->val[] = \tap\tapString($value)->val();
            return $this;
        }
        
        
        public function getLength() {
            return count ($this->val);
        }
        
        
        public function translate (array $translations, Exception $failEx=null) {
            
        }


        /**
         * @param $delimiter
         * @return TapString
         */
        public function implode ($delimiter) {
            return new TapString(implode($delimiter, $this->val));
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