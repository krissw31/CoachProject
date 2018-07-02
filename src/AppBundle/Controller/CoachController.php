<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 29/06/2018
 * Time: 11:35
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Coach;
use AppBundle\Form\CoachType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CoachController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/coaching", name="adminCoaching")
     */
    public function ajoutCoach(Request $request){

        $coach = new Coach();

        $form = $this->createForm(CoachType::class, $coach); //l'instancier
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($coach);
            $em->flush();

            return $this->redirectToRoute("adminAccueil");

        }

        $coachs = $this->getDoctrine()->getRepository("AppBundle:Coach")->findAll();

        return $this->render('@App/admin/coaching/coaching.html.twig',
            [
                "form"=> $form->createView(),
                "coachs"=>$coachs


            ]);


    }
    /**
     * @param Request $request
     * @Route("/coaching", name="coaching")
     */
    public function affichageCoach(){
        $coachs = $this->getDoctrine()->getRepository("AppBundle:Coach")->findAll();
        $ccoach = [];





        return $this->render('App/default/coaching.html.twig',
            [
                "coach"=>$coachs
            ]);

    }






}