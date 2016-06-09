<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 13:28
     */


    namespace tap\test;


    //die (\tap\tapPath("wurst/brot")->toAbsolutePath("/root//./")->resolve("../zwei")->val());


    //die (\tap\tapUrl("http://irgendwas/wurst/brot")->path->val());


    assert (\tap\tapPath("some/path")->isRelative() === true);
    assert (\tap\tapPath("/some/path")->isRelative() === false);

    assert (\tap\tapPath("some/path")->isAbsolute() === false);
    assert (\tap\tapPath("/some/path")->isAbsolute() === true);

    assert (\tap\tapPath("some/path")->toAbsolutePath()->val() === "/some/path");

    assert (\tap\tapPath("/some/path")->resolve()->val() === "/some/path");


    assert (
        \tap\tapPath("some/../relative/path")->resolve()->val()
        === "relative/path"
    );

    assert (
        \tap\tapPath("some/../relative/path")->resolve("..")->val()
        === "relative"
    );

    assert (
        \tap\tapPath("some/../relative/path")->resolve("fileName")->val()
        === "relative/path/fileName"
    );

    assert (
        \tap\tapPath("some/relative/path")->toAbsolutePath("/some/root")->val()
        ===  "/some/root/some/relative/path"
    );


