<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddonVersionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddonVersionsTable Test Case
 */
class AddonVersionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddonVersionsTable
     */
    public $AddonVersions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.addon_versions',
        'app.addons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AddonVersions') ? [] : ['className' => 'App\Model\Table\AddonVersionsTable'];
        $this->AddonVersions = TableRegistry::get('AddonVersions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AddonVersions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
