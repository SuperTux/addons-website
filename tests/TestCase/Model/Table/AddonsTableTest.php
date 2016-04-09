<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddonsTable Test Case
 */
class AddonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddonsTable
     */
    public $Addons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.addons',
        'app.addon_versions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Addons') ? [] : ['className' => 'App\Model\Table\AddonsTable'];
        $this->Addons = TableRegistry::get('Addons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Addons);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
