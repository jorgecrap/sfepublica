<?php

namespace Epublica\ObligacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ObligacionBundle:Default:index.html.twig', array('name' => $name));
    }
}
