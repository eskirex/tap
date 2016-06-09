<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 14:00
     */


    namespace tap\type;
    
    class TapLocalDirectory extends TapLocalPath {


        /**
         * @param callable $cb
         * @param bool $recursive
         * @return TapStringArray
         */
        public function eachFile (callable $cb, $recursive=true) {
            $dir = opendir($this->val);
            if ($dir === false)
                throw new \ErrorException("IO Error: Cannot opendir('{$this->val}')");
            $retStrArr = new TapStringArray([]);
            while (($name = readdir($dir)) !== false) {
                if ($name === "." || $name === "..")
                    continue;

                $subName = $this->val . "/" . $name;

                if (is_file($subName))  {
                    $ret = $cb(new TapLocalFile($subName));
                    if ($ret !== null)
                        $retStrArr->push($ret);
                    continue;
                }
                
                if (is_dir($subName) && $recursive) {
                    $subDir = new self($subName);
                    $retStrArr->push($subDir->eachFile($cb, $recursive));
                }
            }
            closedir($dir);
            return $retStrArr;
        }

        
    }