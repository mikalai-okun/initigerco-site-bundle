<?php

namespace InitigerCo\Bundle\SiteBundle\EventListener;

use InitigerCo\Bundle\SiteBundle\Entity\Site;
use InitigerCo\Bundle\SiteBundle\Manager\SiteManager;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CurrentSiteListener
{
    /** @var SiteManager */
    private $siteManager;

    /** @var EntityManager */
    private $em;

    /** @var string */
    private $baseHost;

    /**
     * CurrentSiteListener constructor.
     *
     * @param SiteManager $siteManager
     * @param EntityManager $em
     * @param $baseHost
     */
    public function __construct(SiteManager $siteManager, EntityManager $em, $baseHost)
    {
        $this->siteManager = $siteManager;
        $this->em = $em;
        $this->baseHost = $baseHost;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $host = $request->getHost();
        $host = str_replace('www.', '', $host);

        $site = $this->em->getRepository(Site::class)->
        findOneBy(['domain' => $host]);

        if (!$site) {
            throw new NotFoundHttpException(sprintf(
                'Cannot find site for host "%s" ',
                $host
            ));
        }

        $this->siteManager->setCurrentSite($site);
    }
}
