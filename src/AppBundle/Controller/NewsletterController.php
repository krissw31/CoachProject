<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 03/07/2018
 * Time: 16:36
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Newsletter;
use AppBundle\Form\NewsletterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class NewsletterController extends Controller
{
    /**
     * @param Request $request
     * @Route("/admin/newsletter", name="adminNewsletter")
     */
    public function actionNewsletter(Request $request){


        $newsletter = new Newsletter();

        $form = $this->createForm(NewsletterType::class, $newsletter); //instanciation
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);

            if($newsletter->getSend() === true){

            }
            $em->flush(); //sauvegarder

            return $this->redirectToRoute("adminNewsletter");
        }

        $newsletters = $this->getDoctrine()->getRepository("AppBundle:Newsletter")->findAll();

        return $this->render('@App/admin/newsletter/newsletter.html.twig',
            [
                "form" => $form->createView(),
                "newsletters" =>$newsletters

            ]);

    }

    /**
     * @param Request $request
     * @Route ("/admin/newsletter/edit{id}", name="newsletter.edit")
     */
    public function editNewsletterAction(Newsletter $newsletter, Request $request){

        $titreNewsletter = $newsletter->getTitle();
        $contentNewsletter = $newsletter->getContent();
        $dateNewsletter = $newsletter->getDate();
        $sendNewsletter = $newsletter->getSend();

        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush();

            return $this->redirectToRoute("adminNewsletter");
        }

        return $this->render('@App/admin/newsletter/newsletter-edit.html.twig',
        [
            "titreNewsletter"=>$titreNewsletter,
            "contentNewsletter"=>$contentNewsletter,
            "dateNewsletter"=>$dateNewsletter,
            "sendNewsletter"=>$sendNewsletter,
            "form" => $form->createView()
        ]

        );
    }

    /**
     *
     * @Route("/admin/newsletter/delete{id}", name="newsletter.delete")
     */
    public function deleteNewsletterAction($id)
    {
        $newsletter = $this->getDoctrine()->getRepository(Newsletter::class)->find($id);
        if ($newsletter!== null){
            $em = $this->getDoctrine()->getManager();
             $em->remove($newsletter);
             $em->flush();
             return $this->redirectToRoute("adminNewsletter");
        }

        return $this->redirectToRoute("adminNewsletter");

    }


}