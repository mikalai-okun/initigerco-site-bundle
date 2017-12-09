<?php

namespace InitigerCo\Bundle\SiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultParamsTest extends WebTestCase
{
    public function testHost()
    {
        $client = static::createClient();

        $myHost = $client->getKernel()->getContainer()->getParameter('site_base_host');

        dump($myHost);
    }
}
