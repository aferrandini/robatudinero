<?php

namespace RobatuDinero\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/quien")
     * @Template()
     */
    public function quienAction()
    {
        return array();
    }

    /**
     * @Route("/detail")
     * @Template()
     */
    public function detailAction()
    {
        return array();
    }

    /**
     * @Route("/character")
     * @Template()
     */
    public function characterAction()
    {
        return array();
    }

    /**
     * @Route("/company")
     * @Template()
     */
    public function companyAction()
    {
        return array();
    }


    /**
     * @Route("/contacto")
     * @Template()
     */
    public function contactoAction()
    {
        return array();
    }


}
