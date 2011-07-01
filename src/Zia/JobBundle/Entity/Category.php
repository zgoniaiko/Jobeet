<?php

namespace Zia\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_category")
 */
class Category {
  /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */  
  protected $id;
  
  /**
    * @ORM\Column(type="string", length="255", unique=true)
    */  
  protected $name;
}
