<?php

namespace Functional\Controller;

use JsonException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class HealthCheckControllerTest extends WebTestCase
{
    /**
     * @throws JsonException
     */
    public function testRequestRespondedSuccessfulResult(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/health-check');

        self::assertResponseIsSuccessful();
        $jsonResult = json_decode($client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $this->assertEquals('ok', $jsonResult['status']);
    }
}