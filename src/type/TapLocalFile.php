<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 14:02
     */

    namespace tap\type;
    
    class TapLocalFile extends TapLocalPath {


        /**
         * @return TapString
         */
        public function getFileName () {
            return new TapString(basename($this->val));
        }


        /**
         * @return TapString
         */
        public function getFileExtension () {
            list($name, $ext) = explode(".", $this->getFileName(), 1);
            return new TapString($ext);
        }
        

        /**
         * @return TapLocalDirectory
         */
        public function getDirectory() {
            return new TapLocalDirectory(dirname($this->val));
        }


        public function rename($newName) {

        }

        public function move($directory) {

        }

        public function unlink() {

        }


        public function getContents() {

        }

        public function setContents ($content) {

        }
        
    }