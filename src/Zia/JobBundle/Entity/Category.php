<?php

namespace Zia\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_category")
 * @ORM\Entity(repositoryClass="Zia\JobBundle\Entity\CategoryRepository")
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

  public function __toString()
  {
    return $this->getName();
  }
  
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}

class CategoryRepository extends EntityRepository
{
  public function getWithJobs()
  {
    return $this->createQuery('c')
      ->leftJoin('c.jobs j')
      ->where('j.expires_at > :date')
      ->setParameter('date', date('Y-m-d H:i:s', time()))
      ->getQuery()
      ->getResult();
  }
}