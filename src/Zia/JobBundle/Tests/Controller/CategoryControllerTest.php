<?php

namespace Zia\JobBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testShowCategory()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/job/');

        $this->assertTrue($crawler->filter('html:contains("List of Jobs")')->count() > 0);

        $crawler = $client->click($crawler->selectLink('Programming')->link());

        $this->assertTrue($crawler->filter('h1:contains("Programming")')->count() > 0);
    }

    public function test404OnNonExistsCategory()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/category/non-exists');

        $this->assertTrue(404 === $client->getResponse()->getStatusCode());
    }
}