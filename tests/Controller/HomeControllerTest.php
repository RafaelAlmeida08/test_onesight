<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testShouldReturnEnglishHomePage(): void
    {
        $client = static::createClient();

        $client->request('GET', '/en');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h3', 'Hello');
    }

    public function testShouldReturnSpanishHomePage(): void
    {
        $client = static::createClient();

        $client->request('GET', '/es');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h3', 'Hola');
    }
}
