<?php

namespace Zia\JobBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Zia\JobBundle\Entity\Job,
    Zia\JobBundle\Entity\Category;

class JobFixtures implements FixtureInterface
{
    public function load($em)
    {
        $design = new Category();
        $design->setName('Design');

        $programming = new Category();
        $programming->setName('Programming');

        $manager = new Category();
        $manager->setName('Manager');

        $administrator = new Category();
        $administrator->setName('Administrator');

        $em->persist($design);
        $em->persist($programming);
        $em->persist($manager);
        $em->persist($administrator);

        $sensio = new Job();
        $sensio->setCategory($programming);
        $sensio->setType('full-time');
        $sensio->setCompany('Sensio Labs');
        $sensio->setLogo('sensio-labs.gif');
        $sensio->setUrl('http://www.sensiolabs.com/');
        $sensio->setPosition('Web Developer');
        $sensio->setLocation('Paris, France');
        $sensio->setDescription("You've already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.");
        $sensio->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
        $sensio->setIsPublic(true);
        $sensio->setIsActivated(true);
        $sensio->setToken('job_sensio_labs');
        $sensio->setEmail('job@example.com');
        $sensio->setExpiresAt(new \DateTime('2012-10-10'));

        $extreme = new Job();
        $extreme->setCategory($design);
        $extreme->setType('part-time');
        $extreme->setCompany('Extreme Sensio');
        $extreme->setLogo('extreme-sensio.gif');
        $extreme->setUrl('http://www.extreme-sensio.com/');
        $extreme->setPosition('Web Designer');
        $extreme->setLocation('Paris, France');
        $extreme->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.

        Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
        $extreme->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
        $extreme->setIsPublic(true);
        $extreme->setIsActivated(true);
        $extreme->setToken('job_extreme_sensio');
        $extreme->setEmail('job@example.com');
        $extreme->setExpiresAt(new \DateTime('2011-10-10'));

        
        $expired = new Job();
        $expired->setCategory($programming);
        $expired->setType('full-time');
        $expired->setCompany('Sensio Labs');
        $expired->setLogo('sensio-labs.gif');
        $expired->setUrl('http://www.sensiolabs.com/');
        $expired->setPosition('Web Developer');
        $expired->setLocation('Paris, France');
        $expired->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit.");
        $expired->setHowToApply('Send your resume to lorem.ipsum [at] dolor.sit');
        $expired->setIsPublic(true);
        $expired->setIsActivated(true);
        $expired->setToken('job_expired');
        $expired->setEmail('job@example.com');
        $expired->setCreatedAt(new \DateTime('2005-12-01'));
        $expired->setExpiresAt(new \DateTime('2006-01-01'));
        
        
        $em->persist($sensio);
        $em->persist($extreme);
        $em->persist($expired);

        for ($i = 100; $i <= 130; $i++){
          $job = new Job();
          $job->setCategory($programming);
          $job->setType('full-time');
          $job->setCompany('Company ' . $i);
          $job->setLogo('sensio-labs.gif');
          $job->setUrl('http://www.sensiolabs.com/');
          $job->setPosition('Web Developer');
          $job->setLocation('Paris, France');
          $job->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit.");
          $job->setHowToApply('Send your resume to lorem.ipsum [at] company_'.$i.'.sit');
          $job->setIsPublic(true);
          $job->setIsActivated(true);
          $job->setToken('job_'.$i);
          $job->setEmail('job@example.com');
          $job->setExpiresAt(new \DateTime(date('Y-m-d', strtotime('+30 days'))));
          
          $em->persist($job);
        }

        $em->flush();
    }
}