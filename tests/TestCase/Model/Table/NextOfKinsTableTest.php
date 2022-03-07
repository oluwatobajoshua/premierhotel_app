<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NextOfKinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NextOfKinsTable Test Case
 */
class NextOfKinsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NextOfKinsTable
     */
    public $NextOfKins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NextOfKins',
        'app.Employees',
        'app.Relationships'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NextOfKins') ? [] : ['className' => NextOfKinsTable::class];
        $this->NextOfKins = TableRegistry::getTableLocator()->get('NextOfKins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NextOfKins);

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
