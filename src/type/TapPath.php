<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 02:41
 */

namespace tap\type;

    use tap\exception\TapAssertionException;
    use tap\exception\TapValueCastingException;
    use tap\TapVal;

    class TapPath extends AbstractTapVal {


        /**
         * @return TapString
         */
        public function asString() {
            return new TapString($this->val);
        }


        public function isAbsolute () {
            if (substr ($this->val, 0, 1) === "/")
                return true;
            return false;
        }
        
        public function isRelative() {
            return ! $this->isAbsolute();
        }


        /**
         * @return $this|TapPath
         */
        public function toAbsolutePath ($prefix=null) {
            if ($this->isAbsolute())
                return $this;
            if ($prefix !== null) {
                $prefix = \tap\tapPath($prefix)->toAbsolutePath();
                return $prefix->resolve($this->val());
            }
            return new TapPath("/" . $this->val);
        }

        /**
         * @return $this|TapPath
         */
        public function toRelativePath ($fromPath="") {
            if ($this->isRelative())
                return $this;

            $fromPath = \tap\tapPath($fromPath)->toAbsolutePath()->resolve();
            $me = $this->toAbsolutePath()->resolve();

            $fromPathArr = explode("/", $fromPath->val());
            $meArr = explode("/", $me->val());

            $relPath = [];

            for($i = 0; $i<count ($meArr); $i++) {
                if ($fromPathArr[$i] === $meArr[$i]) {
                    continue;
                }
            }


            for($i2 = $i; $i2<count($fromPathArr); $i2++ ) {
                $relPath[] = "..";
            }

            for ($i2 = $i; $i2<count ($meArr); $i2++) {
                $relPath[] = $meArr[$i2];
            }
            
            return new self(implode($relPath));
        }


        /**
         * Resolves '..', '.' and double slashes.
         *
         *
         *
         * @return self
         */
        public function resolve($addPath=null) {
            $val = $this->val;
            if ($addPath !== null)
                $val .= "/{$addPath}";
            $parts = explode ("/", $val);

            $ret = [];
            foreach ($parts as $curPart) {
                if ($curPart === "")
                    continue;
                if ($curPart === ".")
                    continue;
                if ($curPart === "..") {
                    if (count ($ret) === 0) {
                        continue;
                    }
                    array_pop($ret);
                    continue;
                }
                $ret[] = $curPart;
            }
            $newPath = implode ("/", $ret);
            if ($this->isAbsolute())
                $newPath = "/" . $newPath;
            return new self($newPath);
        }
        
        
        public function isSubPathOf ($path) {
            $testDir = \tap\tapPath($path)->toAbsolutePath()->resolve()->val();
            $me = $this->toAbsolutePath()->resolve()->val();

            $testDirArr = explode("/", $path);
            $meArr = explode("/", $testDir);

            if (count ($testDirArr) > $meArr)
                return false;

            for ($i=0; $i<count ($testDir); $i++) {
                if ($testDirArr[$i] !== $meArr[$i])
                    return false;
            }
            return true;
        }

        /**
         * @param $directory
         * @param \Exception|NULL $failEx
         * @return $this
         * @throws TapAssertionException
         */
        public function assertIsSubPathOf($directory, \Exception $failEx=null) {
            if ( ! $this->isSubPathOf($directory)) {
                if ($failEx === null)
                    $failEx = new TapAssertionException("Path '{$this->val}' is not subpath of '$directory'", 4, $directory);
                throw $failEx;
            }
            return $this;
        }


        /**
         * @return TapLocalPath
         */
        public function asLocalPath () {
            return new TapLocalPath($this->val);
        }

        /**
         * @return TapLocalFile
         */
        public function asLocalFile () {
            return new TapLocalFile($this->val);
        }



        /**
         * @return TapString
         */
        public function getBaseName () {
            return new TapString();
        }
        

        
        
    }