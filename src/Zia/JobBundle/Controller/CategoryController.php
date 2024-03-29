<?php

namespace Zia\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Zia\JobBundle\Entity\Category;

/**
 * Job controller.
 *
 * @Route("/category")
 */
class CategoryController  extends Controller
{
    /**
     * Finds and displays a Job entity.
     *
     * @Route("/{slug}", name="category_show" )
     * @Template
     */
    public function showAction($slug)
    {
      $em = $this->getDoctrine()->getEntityManager();

      $categories = $em->getRepository('ZiaJobBundle:Category')->findBySlugWithActiveJobs(10, $slug);
      
      if (!$categories) {
        throw $this->createNotFoundException('Unable to find Category.');
      }

      return array('category' => $categories[0]);
    }
}
