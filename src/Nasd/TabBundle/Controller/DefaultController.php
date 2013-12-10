<?php

namespace Nasd\TabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     *
     * @Template()
     */
    public function bibliographyAction()
    {
        return array();
    }
    /**
     *
     * @Template()
     */
    public function aboutAction()
    {
        return array();
    }
}
