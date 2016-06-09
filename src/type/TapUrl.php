<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:40
 */

namespace tap\type;

    use tap\exception\TapValueCastingException;

    class TapUrl extends AbstractTapVal {
        
        
        protected $url = [];

        /**
         * @var TapPath
         */
        public $path;


        /**
         * @var TapStringMap
         */
        public $query;


        protected function __filterIn($val) {
            $this->url = parse_url($val);
            if ($this->url === false)
                throw new TapValueCastingException("Cannot parse_url() on ?", 0, $val);

            parse_str($this->url["query"], $queryArr);
            $this->url["query"] = $this->query = new TapStringMap($queryArr);
            $this->url["path"] = $this->path = new TapPath($this->url["path"]);
        }


        protected function __filterOut() {
            $ret = $this->url["scheme"] . "://";
            $ret .= $this->url["host"];
            $ret .= $this->path->toAbsolutePath()->val();
            if ( ! $this->query->isEmpty())
                $ret .= "?" . $this->query->asQueryString()->val();
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