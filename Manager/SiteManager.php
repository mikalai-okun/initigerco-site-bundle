<?php

namespace InitigerCo\Bundle\SiteBundle\Manager;

use InitigerCo\Bundle\SiteBundle\Entity\Site;

class SiteManager
{
    /**
     * @var Site
     */
    private $currentSite;

    /**
     * @return Site
     */
    public function getCurrentSite()
    {
        return $this->currentSite;
    }

    /**
     * @param Site $currentSite
     */
    public function setCurrentSite(Site $currentSite)
    {
        $this->currentSite = $currentSite;
    }
}