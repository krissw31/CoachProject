<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 03/07/2018
 * Time: 12:12
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\AppBundleEvents;
use AppBundle\Entity\Contact;
use AppBundle\Entity\NewsletterSubscriber;
use AppBundle\Event\ContactEvent;
use AppBundle\Form\NewsletterSubscriberType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class NewsletterSubscriberController extends Controller
{
    /**
     * @param Request $request
     * @Route("/admin/subscriber", name="adminSubscriber")
     */
    public function newsletterSubscriberAction(Request $request)
    {
        $newsSub = new NewsletterSubscriber();

        $form = $this->createForm(NewsletterSubscriberType::class, $newsSub); //l'instancier
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsSub);
            $em->flush(); //sauvegarder

            return $this->redirectToRoute("accueil");
        }

        $newsSubscribers = $this->getDoctrine()->getRepository("AppBundle:NewsletterSubscriber")->findAll();

            return $this->render("@App/admin/newsletterSubscriber/newsletterSubscriber.html.twig",
                [
                    "form" => $form->createView(),
                    "newsSubscribers" => $newsSubscribers,
                ]);
        }

        /**
         * @param Request $request
         * @Route("/newsletteSub", name="newsSub")
         */
        public function newsletterSubAction(Request $request)
        {
            $newsSub = new NewsletterSubscriber();


            $form = $this->createForm(NewsletterSubscriberType::class, $newsSub); //l'instancier
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($newsSub);
                $em->flush(); //sauvegarder

                return $this->redirectToRoute("accueil");
            }


            return $this->render('@App/default/newsletterForm.html.twig',
                [
                    "form" => $form->createView(),
                ]);

        }

    /**
     *
     * @param $newsletterSubscriber NewsletterSubscriber
     * @Route("/admin/newsletterSub/delete{id}", name="newsletterSub.delete")
     */
        public function newsletterSubDelete(NewsletterSubscriber $newsletterSubscriber){

            //je récupère la liste des email

            $contacts = $this->getDoctrine()
                ->getRepository(Contact::class)
                ->findBy(["email" => $newsletterSubscriber->getEmail()]);

               // $event = new ContactEvent($contacts);
                foreach($contacts as $contact){
                    /**
                     * @var contact $contact
                     */
                    $contact->setSendNews(false);
                }


            $em =$this->getDoctrine()->getManager();
            $em->remove($newsletterSubscriber);
            $em->flush();

            return $this->redirectToRoute("adminSubscriber");


        }



}