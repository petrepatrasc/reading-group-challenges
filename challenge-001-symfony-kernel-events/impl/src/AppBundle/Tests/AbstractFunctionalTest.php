<?php


namespace AppBundle\Tests;


use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Governs all of the functional tests of the app and ensures
 * that requests follow redirects.
 *
 * @package AppBundle\Tests
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractFunctionalTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = static::createClient();
        $this->client->followRedirects();
    }

    /**
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    public function getRouter()
    {
        return $this->client->getContainer()->get('router');
    }
}
