<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 04:14
 */

    namespace tap\type;

    class TapArray extends AbstractTapVal {


        public function __construct(array $arr = []) {
            $this->val = $arr;
        }


        public function map (callable $cb) {
            
        }




    }