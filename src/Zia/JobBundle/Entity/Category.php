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
  
  /**
   * @ORM\OneToMany(targetEntity="Job", mappedBy="category")
   */
  protected $jobs;

  public function __toString()
  {
    return $this->getName();
  }
  
  public function getSlug()
  {
    return Utils::slugify($this->getName());
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
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add jobs
     *
     * @param Zia\JobBundle\Entity\Job $jobs
     */
    public function addJobs(\Zia\JobBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;
    }

    /**
     * Get jobs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}