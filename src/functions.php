<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 12:09
     */

    namespace tap;
    use tap\type\TapLocalPath;

    /**
     * @param $val
     * @return TapVal
     */
    function tapVal ($val) {
        return Tap::AsVal($val);
    }


    /**
     * @param $val
     * @return type\TapString
     * @throws exception\TapValueCastingException
     */
    function tapString ($val) {
        return Tap::AsString($val);
    }


    /**
     * @param $val
     * @return type\TapPath
     * @throws exception\TapValueCastingException
     */
    function tapPath ($val) {
        return Tap::AsPath($val);
    }

    /**
     * @param $path
     * @return TapLocalPath
     */
    function tapLocalPath ($path) {
        return Tap::AsLocalPath($path);
    }

    /**
     * @param $url
     * @return type\TapUrl
     * @throws exception\TapValueCastingException
     */
    function tapUrl ($url) {
        return Tap::AsUrl($url);
    }

    /**
     * @param $ip
     * @return type\TapIp
     * @throws exception\TapValueCastingException
     */
    function tapIp ($ip) {
        return Tap::AsIp($ip);
    }
    