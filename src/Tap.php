<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 12:01
     */


    namespace tap;
    
    
    
    use tap\exception\TapValueCastingException;
    use tap\type\AbstractTapVal;
    use tap\type\TapFileName;
    use tap\type\TapInt;
    use tap\type\TapIp;
    use tap\type\TapLocalPath;
    use tap\type\TapPath;
    use tap\type\TapString;
    use tap\type\TapUrl;

    class Tap extends AbstractTapVal {


        /**
         * @param $val
         * @return TapVal
         */
        public static function AsVal ($val) {
            if ($val instanceof TapVal)
                return $val;
            if ($val instanceof AbstractTapVal)
                return new TapVal($val->val());
            return new TapVal($val);
        }

        /**
         * @param $val
         * @return TapString
         * @throws TapValueCastingException
         */
        public static function AsString($val) {
            if ($val instanceof TapString)
                return $val;
            if ($val instanceof AbstractTapVal)
                $val = $val->val();
            if ( ! is_string($val)) {
                throw new TapValueCastingException("Cannot cast type " . gettype($val) . " as TapString", 1, $val);
            }
            return new TapString($val);
        }


        /**
         * @param $val
         * @return mixed|TapInt
         * @throws TapValueCastingException
         */
        public static function AsInt($val) {
            if ($val instanceof TapInt)
                return $val;
            if ($val instanceof AbstractTapVal)
                $val = $val->val();
            if (is_string($val)) {
                if ( ! filter_var(FILTER_VALIDATE_INT, $val)) {
                    throw new TapValueCastingException("String '$val' cannot be casted to integer", 3, $val);
                }
                $val = intval($val);
            }
            if ( ! is_int($val)) {
                throw new TapValueCastingException("Cannot cast type " . gettype($val) . " as TapString", 1, $val);
            }
            return new TapInt($val);
        }


        /**
         * @param $val
         * @return mixed|TapPath
         * @throws TapValueCastingException
         */
        public static function AsPath ($val) {
            if ($val instanceof TapPath)
                return $val;
            if ($val instanceof AbstractTapVal)
                $val = $val->val();
            if ( ! is_string($val)) {
                throw new TapValueCastingException("Cannot cast type " . gettype($val) . " as TapString", 1, $val);
            }
            $val = str_replace("\\", "/", $val);
            return new TapPath($val);
        }

        /**
         * @param $path
         * @return TapLocalPath
         */
        public static function AsLocalPath ($path) {
            if ($path instanceof TapLocalPath)
                return $path;
            if ($path instanceof TapPath)
                return $path->asLocalPath();
            return new TapLocalPath($path);
        }

        /**
         * @param $url
         * @return TapUrl
         * @throws TapValueCastingException
         */
        public static function AsUrl ($url) {
            if ($url instanceof TapUrl) {
                return $url;
            }
            if ( ! is_string($url)) {
                throw new TapValueCastingException("Cannot cast type ? as TapString", 1, $url);
            }
            if ( ! filter_var($url, FILTER_VALIDATE_URL))
                throw new TapValueCastingException("String ? is not in url format", 2, $url);
            return new TapUrl($url);
        }

        /**
         * @param $ip
         * @return TapIp
         * @throws TapValueCastingException
         */
        public static function AsIp ($ip) {
            if ($ip instanceof TapIp)
                return $ip;
            if ( ! is_string($ip)) {
                throw new TapValueCastingException("Cannot cast type ? as TapString", 1, $ip);
            }
            if (filter_var($ip, FILTER_VALIDATE_IP) === false)
                throw new TapValueCastingException("String ? is no valid ip", 2, $ip);
            return new TapIp($ip);
        }


    }