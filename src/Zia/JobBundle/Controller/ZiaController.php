<?php

namespace Zia\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ZiaController extends Controller
{

  //$this->setFlash('notice', 'Your changes were saved!');
  //$this->setFlash('error', "Your changes wasn't been saved!");

  protected function setFlash($name, $message) {
    $this->get('session')->setFlash($name, $message);
  }
}