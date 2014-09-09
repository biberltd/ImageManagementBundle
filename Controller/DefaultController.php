<?php

namespace BiberLtd\Bundle\ImageManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BiberLtdImageManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
