<?php
require_once __DIR__ . '/../../../fixtures/TestService.php';

use DTS\eBaySDK\Services\BaseService;

class BaseServiceCtorTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    private $config = array(
        'bish' => 'bish',
        'bash' => 'bash',
        'bosh' => 'bosh'
    );

    protected function setUp()
    {
        // BaseService is abstract so use class that is derived from it for testing.
        // Can pass in an associative array of configuration options.
        $this->obj = new TestService($this->config);
    }

    public function testConfigurationOptionsHaveBeenSetInCtor()
    {
        $this->assertEquals($this->config, $this->obj->config());
    }

    public function testInvalidConfigurationOptionsHaveBeenSetInCtor()
    {
        $this->setExpectedException('\InvalidArgumentException', 'Unknown configuration property: invalid');

        new TestService(array(
            'bish' => 'bish',
            'invalid' => 'xxx'
        ));
    }
}