<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:40
 */

namespace tap\type;

    use tap\exception\TapInternalException;
    use tap\exception\TapValueCastingException;
    use tap\map\TapMap;

    /**
     * Class TapUrl
     * 
     *
     * @property string     $url
     * @property TapString  $scheme
     * @property TapHostName $host
     * @property TapHostNameArr $hosts
     * @property TapInt     $port
     * @property TapString  $username
     * @property TapString  $password
     * @property TapPath    $path
     * @property TapMap     $query
     * @package tap\type
     */
    class TapUrl extends AbstractTapVal {
        
        
        private $url;


        private $scheme;


        private $host;

        private $port;

        private $username;

        private $password;


        /**
         * Accessed by __ge() and __set()
         *
         * @var TapPath
         */
        private $path;


        /**
         * Accessed by __get() and __set()
         *
         * @var TapStringMap
         */
        private $query;


        private $fragment;





        public function __get($name) {
            switch ($name) {
                case "path":
                    return $this->path;

                case "url":
                    return $this->__filterOut();
                
                case "port":
                    return tapInt($this->port);
                
                case "query":
                    return $this->query;
                default:
                    throw new TapInternalException("Invalid property: TapUrl::$'$name'");
            }
        }
        
        public function __set($name, $value) {
            switch ($name) {
                case "path":    
                    $this->path = \tap\tapUrl($value);
                    break;
                
                case "url":
                    $this->__filterIn($value);
                
                default:
                    throw new TapInternalException("Invalid setter: TapUrl::$'$name'");
            }
        }
        

        protected function __filterIn($val) {
            $parsed = parse_url($val);
            if ($parsed === false)
                throw new TapValueCastingException("Cannot parse_url() on ?", 0, $val);

            parse_str($parsed["query"], $queryArr);
            $this->scheme = $parsed["query"];
            $this->host = $parsed["host"];
            $this->hosts = explode(",", $parsed["host"]);
            $this->port = $parsed["port"];
            $this->user = $parsed["username"];
            $this->passwd = $parsed["password"];
            $this->fragment = $parsed["fragment"];
            $this->query = new TapStringMap($queryArr);
            $this->path = new TapPath($this->url["path"]);
        }


        protected function __filterOut() {
            $ret = $this->scheme . "://";
            if ($this->user !== null || $this->passwd !== null) {
                $ret .= urlencode($this->user) . ":" . urlencode($this->passwd) . "@";
            }
            $ret .= $this->host;
            if ($this->port !== null)
                $ret .= ":{$this->port}";
            $ret .= $this->path->toAbsolutePath()->val();
            if ( ! $this->query->isEmpty())
                $ret .= "?" . $this->query->asQueryString()->val();

            if ($this->fragment !== null)
                $ret .= "#" . urlencode($this->fragment);
            return $ret;
        }

        public function isMultiHostUrl() {
            
        }

        /**
         * @param $scheme
         * @return $this
         */
        public function setScheme($scheme) {
            $scheme = \tap\tapString($scheme);
            $scheme->assertPregMatch("/^[a-z0-9]$/");
            $this->url["scheme"] = $scheme->val();
            return $this;
        }

        /**
         * @return TapString
         */
        public function getScheme() {
            if ( ! isset ($this->url["scheme"]))
                return new TapString("");
            return new TapString($this->url["scheme"]);
        }


        /**
         * @return TapHostName
         */
        public function getHostName () {
            if ( ! isset ($this->url["host"]))
                return new TapHostName("");
            return new TapHostName($this->url["host"]);
        }
        
        public function getHostNames() {
            
        }


        /**
         * @return TapPath
         */
        public function getPath() {
            return clone $this->path;
        }


        /**
         * @return TapStringMap
         */
        public function getQuery() {
            return clone $this->query;
        }
        
    }