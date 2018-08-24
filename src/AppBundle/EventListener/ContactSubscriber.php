<?php

namespace AppBundle\EventListener;


use Symfony\Bridge\Doctrine\RegistryInterface as Doctrine;
use AppBundle\AppBundleEvents;
use AppBundle\Event\ContactEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ContactSubscriber implements EventSubscriberInterface
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * ContactSubscriber constructor.
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }


    public static function getSubscribedEvents()
    {
        return [
            AppBundleEvents::ON_CONTACT => "handleContact",
            AppBundleEvents::ON_CONTACT => "handleNewsletter"
        ];
    }

    public function handleContact(ContactEvent $event)
    {
        // persister l'objet contact
    }

    public function handleNewsletter(ContactEvent $event)
    {
        if($event->getContact()->getSendNews() === true)
        {
            // j'enregistre le mail

        }
    }

}