<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.06.16
 * Time: 05:46
 */


\tap\tapval("wurst")->assertIsString()->assertUri()->isFileName()