<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\AppBundleEvents;
use AppBundle\Entity\Contact;
use AppBundle\Entity\NewsletterSubscriber;
use AppBundle\Event\ContactEvent;
use AppBundle\Form\ContactType;
use Doctrine\ORM\Mapping\Id;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{

    /**
     * @param Request $request
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request){

        $contact = new Contact();
       // $contact->setDate(new \DateTime('now',null));


        $form = $this->createForm(ContactType::class, $contact); //l'instancier
        $form->handleRequest($request); //persister
        if ($form->isSubmitted() && $form->isValid()) {

            // Créer un objet Event
            $event = new ContactEvent($contact);
            $this->get('event_dispatcher')->dispatch(AppBundleEvents::ON_CONTACT, $event);

            // $this->>get('event_dispatcher)->send()

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);

            if ($contact->getSendNews() === true){
                $newsletterSubscriber = new NewsletterSubscriber();
                $newsletterSubscriber->setEmail($contact->getEmail());
                $em->persist($newsletterSubscriber);




            }

            $em->flush(); //sauvegarder

            return $this->redirectToRoute("accueil");
        }



        return $this->render('@App/default/contact.html.twig',
            [
                "form" => $form->createView(),

            ]);

    }

    /**
     * @param Request $request
     * @Route("/admin/contact/edit{id}", name="contact.edit")
     */
    public function editAction(Contact $contact, Request $request){



        $nomContact = $contact->getName();
        $prenomContact = $contact->getPrenom();
        $dateContact = $contact->getDate();
        $emailContact = $contact->getEmail();
        $messageContact = $contact->getComment();
        $sendNews = $contact->getSendNews();


        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();




            return $this->redirectToRoute("adminContact");
        }



        return $this->render('@App/admin/contact/contact-edit.html.twig',
        [
            "contactName"=>$nomContact,
            "contactPrenom"=>$prenomContact,
            "contactDate"=>$dateContact,
            "contactEmail"=>$emailContact,
            "contactMessage"=>$messageContact,
            "sendNews"=>$sendNews,
            "form" => $form->createView()

            ]);
    }
}
