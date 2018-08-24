<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 25/06/2018
 * Time: 15:19
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Newsletter;
use AppBundle\Repository\ContactRepository;
use AppBundle\Repository\NewsletterRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{

    /**
     * @Route("/admin/", name="adminAccueil")
     */
    public function adminAccueil(){

        $contacts = $this->getDoctrine()->getRepository("AppBundle:Contact")->findAll();
        $nbContacts=count($contacts);
        $newsletters = $this->getDoctrine()->getRepository("AppBundle:Newsletter")->findAll();
        $nbNewsletters = count($newsletters);
        $lastNewslettersEdit = $this->getDoctrine()->getRepository(Newsletter::class)->findLastNewsEdit();

       // dump($lastNewslettersEdit); die();

        $nbnewsLast = count($lastNewslettersEdit);
        return $this->render('@App/admin/accueil.html.twig',
            [
                "nbContacts"=>$nbContacts,
                "nbNewsletters"=>$nbNewsletters,
                "nbnewsLast"=>$nbnewsLast,
            ]);


    }
    /**
     * @Route("/admin/contact", name="adminContact")
     */
    public function adminContact(Request $request){
        $contacts = $this->getDoctrine()->getRepository("AppBundle:Contact")->findAll();

        return $this->render('@App/admin/contact/index.html.twig',
        [
            "contacts"=>$contacts
        ]
            );
    }





    /**
     * @Route("/admin/me", name="adminQuisuisje")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminQuisuisje(){
        return $this->render('@App/admin/me/quisuisje.html.twig');
    }





}