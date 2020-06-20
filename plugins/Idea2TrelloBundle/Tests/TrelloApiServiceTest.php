<?php

declare(strict_types=1);
/**
 * @author      Mautic

 * @copyright   2020 Mautic Contributors. All rights reserved
 *
 * @see        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\Idea2TrelloBundle\Tests;

use Mautic\CoreBundle\Helper\CoreParametersHelper;
use Mautic\PluginBundle\Helper\IntegrationHelper;
use MauticPlugin\Idea2TrelloBundle\Integration\TrelloIntegration;
use MauticPlugin\Idea2TrelloBundle\Openapi\lib\Api\DefaultApi;
use MauticPlugin\Idea2TrelloBundle\Service\TrelloApiService;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

/**
 * Test the Service providing the auto generated Trello API to the Idea2TrelloBundle.
 */
class TrelloApiServiceTest extends TestCase
{
    /**
     * The Api to Trello.
     *
     * @var MauticPlugin\Idea2TrelloBundle\Openapi\lib\Api\DefaultApi
     */
    private $api;

    /**
     * A service for the OpenAPI client.
     */
    private $integration;

    /**
     * @var Logger|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $logger;

    protected function setUp()
    {
        parent::setUp();

        $this->integration = $this->getMockBuilder(TrelloApiService::class)
        ->disableOriginalConstructor()
        // ->setConstructorArgs([
        //     $this->createMock(IntegrationHelper::class),
        //     $this->createMock(CoreParametersHelper::class),
        //     $this->createMock(Logger::class),
        // ])
        ->getMock();

        $this->api = $this->integration->getApi();
    }

    public function testIsApiAvailable()
    {
        $this->assertInstanceOf(DefaultApi::class, $this->api);
    }
}
