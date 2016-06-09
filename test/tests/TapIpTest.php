<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 09.06.16
     * Time: 18:00
     */


    assert (\tap\tapIp("46.183.102.2")->isIpv4() === true);
    assert (\tap\tapIp("46.183.102.2")->isIpv6() === false);
    assert (\tap\tapIp("::bd")->isIpv4() === false);
    assert (\tap\tapIp("::1")->isIpv6() === true);

    assert (\tap\tapIp("46.183.102.2")->isPrivateSpace() === false);
    assert (\tap\tapIp("192.168.90.1")->isPrivateSpace() === true);
    assert (\tap\tapIp("10.11.12.14")->isPrivateSpace() === true);


    assert (\tap\tapIp("192.168.90.4")->isInSubnet("192.168.90.0/24") === true);

    assert (\tap\tapIp("46.183.102.4")->isInSubnet("0.0.0.0/0") === true);
    assert (\tap\tapIp("1.2.3.4")->isInSubnet("0.0.0.0/32") === false);