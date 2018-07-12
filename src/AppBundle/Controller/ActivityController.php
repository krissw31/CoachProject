<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 06/07/2018
 * Time: 15:10
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Coaching;
use AppBundle\Form\CoachingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ActivityController extends Controller
{
        /**
         * @Route("/admin/activity", name="adminActivity")
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function adminActivity(){
            return $this->render('@App/admin/activity/activity.html.twig');
        }

        /**
         *@param Request $request
         * @Route("/admin/activity/ajout", name="activityAjout")
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function activityAction(Request $request){
            $coaching = new Coaching();

            $form = $this->createForm(CoachingType::class, $coaching); //l'instancier
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($coaching);
                $em->flush();

                return $this->redirectToRoute("adminActivity");

            }
            return $this->render('@App/admin/activity/activity-ajout.html.twig',

                [
                    "form"=> $form->createView(),



                ]);

        }




}