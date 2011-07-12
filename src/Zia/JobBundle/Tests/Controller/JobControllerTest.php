<?php

namespace Zia\JobBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/job/');

        $this->assertTrue($crawler->filter('html:contains("List of Jobs")')->count() > 0);
    }

    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/job/');
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());
        $crawler = $client->click($crawler->selectLink('Post a Job')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'zia_jobbundle_jobtype[type]'  => 'full-time',
            'zia_jobbundle_jobtype[company]'  => 'some company',
            'zia_jobbundle_jobtype[logo]'  => 'http://www.company.com/',
            'zia_jobbundle_jobtype[url]'  => 'http://www.company.com/',
            'zia_jobbundle_jobtype[position]'  => 'Web Developer',
            'zia_jobbundle_jobtype[location]'  => 'Paris, France',
            'zia_jobbundle_jobtype[description]'  => 'test description',
            'zia_jobbundle_jobtype[howToApply]'  => 'send email',
            'zia_jobbundle_jobtype[isPublic]'  => '1',
            'zia_jobbundle_jobtype[isActivated]'  => '1',
            'zia_jobbundle_jobtype[token]'  => 'job_somecompany',
            'zia_jobbundle_jobtype[email]'  => 'job@company.com',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertTrue($crawler->filter('html:contains("some company")')->count() > 0);
    }
}