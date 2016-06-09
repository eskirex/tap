<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 04:08
 */

    namespace tap\type;

    class AbstractTapVal {

        protected $val;

        /**
         * AbstractTapVal constructor.
         *
         * Inside Tap the types are considered "save".
         *
         * So nobody from outside may call constructors
         *
         * @param $val
         */
        protected function __construct ($val) {
            $this->__filterIn($val);
        }


        protected function __filterIn ($val) {
            $this->val = $val;
        }

        protected function __filterOut () {
            return $this->val;
        }


        /**
         * Return the original PHP Type
         *
         * @return mixed
         */
        public function val() {
            return $this->__filterOut();
        }


     

    }