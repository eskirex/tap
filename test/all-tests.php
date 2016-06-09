<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 11:34
     */


    require __DIR__ . "/../src/autoload.php";
    

    ini_set("zend.assertions", "1");

    


    \tap\tapPath(__DIR__ . "/tests")->asLocalPath()->asLocalDirectory()->eachFile(
            function (\tap\type\TapLocalFile $file) {
                require $file->val();
            }
    );