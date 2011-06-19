<?php
/**
 * @author Sean McGary <sean@seanmcgary.com>
 */
require_once(dirname(dirname(dirname(__FILE__))).'/test_case.php');
class lib_controllers_welcomeTest extends test_case
{
    public $welcome_controller;

    public function __construct()
    {
        parent::__construct(get_class($this));
    }

    public function setUp()
    {
        $this->welcome_controller = new lib_controllers_welcome();

    }

    /**
     * @test
     */
    public function hasObjectTestModel_Test()
    {

        $this->assertEquals(true, property_exists($this->welcome_controller, 'test_model'));
        $this->assertEquals(true, property_exists($this->welcome_controller, 'other_model'));
        $this->assertEquals(true, property_exists($this->welcome_controller, 'uri'));
        $this->assertEquals(true, property_exists($this->welcome_controller, 'load'));
    }

    /**
     * @test
     */
    public function objectsAreOfRightType_Test()
    {
        $this->assertInstanceOf('lib_models_testModel', $this->welcome_controller->test_model);
        $this->assertInstanceOf('core_uri', $this->welcome_controller->uri);
        $this->assertInstanceOf('core_load', $this->welcome_controller->load);
    }
}