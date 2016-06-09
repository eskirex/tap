<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:44
 */

namespace tap\type;

    class TapHostName extends AbstractTapVal {


        /**
         * @return mixed
         */
        public function isIp() {
            return filter_var($this->val, FILTER_VALIDATE_IP);
        }


        /**
         * @return TapIp
         */
        public function resolve() {
            if ($this->isIp()) {
                return new TapIp($this->val);
            }
            $ip = gethostbyname($this->val);
            return new TapIp($ip);
        }
        

    }