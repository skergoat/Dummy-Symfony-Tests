<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class developerControllerTest extends WebTestCase
{
     public function testHomepage()
     {
         $client = static::createClient();
         $crawler = $client->request('GET', 'developer/');

         $this->assertSame(1, $crawler->filter('h1')->count());
     }

     public function testSubmitForm()
     {
        $client = static::createClient();
        $crawler = $client->request('GET', 'developer/new');

        $form = $crawler->selectButton('Save')->form();
        $form['developer[name]'] = 'Marc';
        $form['developer[languages]'] = 'CSS, SASS, React';
        $form['developer[experience]'] = 3;
        $crawler = $client->submit($form);

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('h1')->count());
     }

     public function testLink()
     {
        $client = static::createClient();
        $crawler = $client->request('GET', 'developer/');

        $link = $crawler->selectLink('Create new')->link();
        $crawler = $client->click($link);

        $info = $crawler->filter('h1')->text();

        $this->assertSame('Create new Developer', $info);
     }
}