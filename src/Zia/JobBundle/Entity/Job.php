<?php

namespace Zia\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_job")
 */
class Job
{
  /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */  
  protected $id;
  
  /**
    * @ORM\ManyToOne(targetEntity="Category" )
    * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
    */  
  protected $category;
  
  /**
    * @ORM\Column(type="string", length="255")
    */  
  protected $type;
  
  /**
    * @ORM\Column(type="string", length="255", nullable=true)
    */  
  protected $company;
  
  /**
    * @ORM\Column(type="string", length="255")
    */  
  protected $logo;
  
  /**
    * @ORM\Column(type="string", length="255", nullable=true)
    */  
  protected $url;
  
  /**
    * @ORM\Column(type="string", length="255", nullable=true)
    */  
  protected $position;
  
  /**
    * @ORM\Column(type="string", length="255")
    */  
  protected $location;
  
  /**
    * @ORM\Column(type="string", length="4000")
    */  
  protected $description;
  
  /**
    * @ORM\Column(type="string", length="4000", name="how_to_apply")
    */  
  protected $howToApply;
  
  /**
    * @ORM\Column(type="string", length="255", unique=true)
    */  
  protected $token;
  
  /**
    * @ORM\Column(type="boolean", name="is_public")
    */  
  protected $isPublic;
  
  /**
    * @ORM\Column(type="boolean", name="is_activated")
    */  
  protected $isActivated;
  
  /**
    * @ORM\Column(type="string", length="255")
    */  
  protected $email;
  
  /**
    * @ORM\Column(type="datetime", name="created_at")
    */  
  protected $createdAt;
  
  /**
    * @ORM\Column(type="datetime", name="updated_at")
    */  
  protected $updatedAt;
  
  /**
    * @ORM\Column(type="datetime", name="expires_at")
    */  
  protected $expiresAt;
  
  public function __construct() {
    $this->createdAt = new \DateTime();
    $this->updatedAt = new \DateTime();
  }
}