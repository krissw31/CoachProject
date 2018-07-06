<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 03/07/2018
 * Time: 12:12
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\NewsletterSubscriber;
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


}