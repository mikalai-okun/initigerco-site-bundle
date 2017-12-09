<?php

namespace InitigerCo\Bundle\SiteBundle\Tests\Unit;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultParamsTest extends WebTestCase
{
    public function testHost()
    {
        $client = static::createClient();

        $myHost = $client->getKernel()->getContainer()->getParameter('site_base_host');

        $this->assertNotEmpty($myHost);
    }
}
