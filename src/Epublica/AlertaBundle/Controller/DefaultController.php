<?php

namespace Epublica\AlertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AlertaBundle:Default:index.html.twig', array('name' => $name));
    }
}
