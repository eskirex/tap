<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:31
 */

namespace tap\type;


    use tap\exception\TapAssertionException;
    use tap\exception\TapException;
    use tap\type\group\TapValidKeyInterface;

    class TapString extends AbstractTapVal implements TapValidKeyInterface {


        /**
         * @param $delimiter
         * @return TapStringArray
         */
        public function explode($delimiter, $limit=null) {
            return new TapStringArray(explode($delimiter, $this->val, $limit));
        }

        
        public function assertPregMatch($regex, \Exception $failEx=null, callable $matchCallback=null) {
            if ( ! preg_match($regex, $this->val, $matches)) {
                if ($failEx === null)
                    $failEx = new TapAssertionException("Value '{$this->val} does not match preg '$regex'", 0, $this->val);
                throw $failEx;
            }
            if ($matchCallback !== null) {
                $ret = $matchCallback($matches);
                if (is_string($ret))
                    $ret = new TapString($ret);
                if ( ! $ret instanceof TapString)
                    throw new TapException("Callback must return string or TapString.");
                return $ret;
            }
            return $this;
        }
        
        public function assertStartsWith ($str, \Exception $failEx=null) {
            return $this;
        }
        
        public function assertEndsWith ($str, \Exception $failEx=null) {
            return $this;
        }
        
        public function assertStrLenBetween($min=null, $max=null, \Exception $failEx=null) {
            return $this;
        }
        
        public function assertEMailAddress (\Exception $failEx=null) {
            
        }

        /**
         * @param \Exception|null $failEx
         * @return TapUri
         * @throws TapAssertionException
         */
        public function assertUri (\Exception $failEx=null) {
            if ( ! filter_var($this->val, FILTER_VALIDATE_URL)) {
                if ($failEx === null)
                    $failEx = new TapAssertionException("Value '{$this->val}' is no valid uri", 0, $this->val);
                throw $failEx;
            }
            return new TapUri($this->val);                
        }


        /**
         * @param $regex
         * @param $replacement
         * @param int $limit
         * @param $count
         * @return TapString
         */
        public function pregReplace ($regex, $replacement, $limit=-1, &$count) {
            $ret = preg_replace($regex, $replacement, $this->val, $limit, $count);
            return new self($ret);
        }
        
        public function pregReplaceCallback ($regex, callable $cb) {
            
        }
        
        public function substr ($start, $length=null) {
            
        }
        
        public function trim () {
                
        }
        
        public function toUpper () {
            return new self(strtoupper($this->val));
        }
        
        
        public function toLower () {
            return new self(strtolower($this->val));
        }
        
        
        
        public function startsWith ($str) {
            
        }
        
        public function endsWith ($str) {
            
        }
        
        public function strlen () {
            
        }
        
        


        /**
         * Übersetzt werte in neue Werte:
         * 
         * [A => "Wert A", "B" => "Wert B"]
         * 
         * @param array $translation
         * @param Exception|null $failEx
         */
        public function translate(array $translation, \Exception $failEx=null) {
            
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