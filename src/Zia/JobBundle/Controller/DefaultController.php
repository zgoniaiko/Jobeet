<?php

namespace Zia\JobBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends ZiaController
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
      return array();
    }
}
