<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/default/index.html.twig');//, [
           // 'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        //]);
    }


    /**
     * @Route("/coaching", name="coaching")
     *
     */
    public function coachingAction(Request $request){
        return $this->render('@App/default/coaching.html.twig');
    }

    /**
     * @Route("/activity", name="activity")
     *
     */
    public function activityAction(Request $request)
    {
        return $this->render('@App/default/activity.html.twig');
    }

    /**
     * @Route("/quisuisje", name="quisuisje")
     *
     */
    public function meAction(Request $request)
    {
        return $this->render('@App/default/me.html.twig');
    }


}
