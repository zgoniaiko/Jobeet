<?php

namespace Zia\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_job")
 * @ORM\Entity(repositoryClass="Zia\JobBundle\Entity\JobRepository")
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
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="jobs" )
    * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
    */  
  protected $category;
  
  /**
    * @ORM\Column(type="string", length=255)
    */  
  protected $type;
  
  /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */  
  protected $company;
  
  /**
    * @ORM\Column(type="string", length=255)
    */  
  protected $logo;
  
  /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */  
  protected $url;
  
  /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */  
  protected $position;
  
  /**
    * @ORM\Column(type="string", length=255)
    */  
  protected $location;
  
  /**
    * @ORM\Column(type="string", length=4000)
    */  
  protected $description;
  
  /**
    * @ORM\Column(type="string", length=4000, name="how_to_apply")
    */  
  protected $howToApply;
  
  /**
    * @ORM\Column(type="string", length=255, unique=true)
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
    * @ORM\Column(type="string", length=255)
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
  
  public function __toString()
  {
    return sprintf('%s at %s (%s)', $this->getPosition(), $this->getCompany(), $this->getLocation());
  }
  
  public function getCompanySlug()
  {
    return Utils::slugify($this->getCompany());
  }

  public function getPositionSlug()
  {
    return Utils::slugify($this->getPosition());
  }

  public function getLocationSlug()
  {
    return Utils::slugify($this->getLocation());
  }
  
  /**
    * @ORM\PrePersist
    */  
  public function setupCreatedAt()
  {
    $this->createdAt = new \DateTime();
  }

  /**
    * @ORM\PreUpdate
    */  
  public function setupUpdatedAt()
  {
    $this->updatedAt = new \DateTime();
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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set logo
     *
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set position
     *
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set howToApply
     *
     * @param string $howToApply
     */
    public function setHowToApply($howToApply)
    {
        $this->howToApply = $howToApply;
    }

    /**
     * Get howToApply
     *
     * @return string 
     */
    public function getHowToApply()
    {
        return $this->howToApply;
    }

    /**
     * Set token
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set isPublic
     *
     * @param boolean $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
    }

    /**
     * Get isPublic
     *
     * @return boolean 
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * Set isActivated
     *
     * @param boolean $isActivated
     */
    public function setIsActivated($isActivated)
    {
        $this->isActivated = $isActivated;
    }

    /**
     * Get isActivated
     *
     * @return boolean 
     */
    public function getIsActivated()
    {
        return $this->isActivated;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set expiresAt
     *
     * @param datetime $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Get expiresAt
     *
     * @return datetime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set category
     *
     * @param Zia\JobBundle\Entity\Category $category
     */
    public function setCategory(\Zia\JobBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Zia\JobBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}