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
     * @Route("/{id}", name="category_show" )
     * @ParamConverter("category", class="ZiaJobBundle:Category")
     * @Template
     */
    public function showAction(Category $category)
    {
    }
}
