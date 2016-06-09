<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 12:34
     */

    namespace tap\type;

    use tap\exception\TapLocalFileException;
    use tap\exception\TapValueCastingException;

    class TapLocalPath extends TapPath {
        
        
        public function toAbsolutePath($prefix = null) {
            if ($prefix === null)
                $prefix = getcwd();
            return parent::toAbsolutePath($prefix); 
        }
        
        public function toRelativePath($fromPath = null) {
            if ($fromPath === null)
                $fromPath = getcwd();
            return parent::toRelativePath($fromPath); 
        }

        
        public function isExisting () {
            return file_exists($this->val);
        }


        /**
         * @return TapLocalDirectory
         * @throws TapLocalFileException
         */
        public function asLocalDirectory() {
            if ( ! is_dir($this->val))
                throw new TapLocalFileException("Directory ? not existing", 0, $this->val);
            return new TapLocalDirectory($this->val);
        }
        
        
        public function asLocalFile () {
            
        }
        
        
        


    }