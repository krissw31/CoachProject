<?php

namespace AppBundle\EventListener;


use AppBundle\Entity\Newsletter;
use AppBundle\Entity\NewsletterSubscriber;
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

    private $mailer;

    /**
     * ContactSubscriber constructor.
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine, \Swift_Mailer $mailer)
    {
        $this->doctrine = $doctrine;
        $this->mailer = $mailer;
    }


    public static function getSubscribedEvents()
    {
        return [
            AppBundleEvents::ON_CONTACT => [
                ["handleContact",10],
                ["handleNewsletter",-10]
            ],
           // AppBundleEvents::ON_CONTACT_DELETE_NEWS=> ["xxxxxx",10],
            AppBundleEvents::ON_ADMIN_CONTACT => ["handleNewsletter"],
            //AppBundleEvents::ON_CONTACT => "handleNewsletter"
        ];
    }

    public function handleContact(ContactEvent $event)
    {

        $em = $this->doctrine->getManager();
        $em->persist($event->getContact());
        // persister l'objet contact
        $em->flush(); //sauvegarder

    }

    public function handleNewsletter(ContactEvent $event)
    {

        $em = $this->doctrine->getManager();
        $contact = $event->getContact();
        if($contact->getSendNews() === true)
        {
            // j'enregistre le mail
            $newsletterSubscriber = new NewsletterSubscriber();
            $newsletterSubscriber->setEmail($contact->getEmail());
            $em->persist($newsletterSubscriber);

        }




        $em->flush(); //sauvegarder
    }

    public function sendMailer(ContactEvent $event){
       // dump($event);

        $this->mailer;
    }
    public function deleteSendNewsletter(ContactEvent $event, NewsletterSubscriber $newsletterSubscriber)
    {


       /* $em =$this->doctrine->getManager();
        $contact = $event->getContact();
        $newsletterSubscriber = $this->doctrine->getRepository(NewsletterSubscriber::class)
                                                ->findBy(['email' => $contact->getEmail()]);
        //si la newsletter est coché false sur le contact
         if($contact->getSendNews() === false){
             //je supprime l'email de newsletterSubscriber;
             $em = $this->doctrine->getManager();
             $em->remove($newsletterSubscriber);
         }

        $em->flush();
   */ }
}