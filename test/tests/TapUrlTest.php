<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 18:32
     */


    ($url = \tap\tapUrl("http://123.124.234.3,123.123.123.123/some/path?opt[]=wurst"));


    print_r ($url->val());