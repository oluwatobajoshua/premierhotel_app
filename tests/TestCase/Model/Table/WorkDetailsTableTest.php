<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkDetailsTable Test Case
 */
class WorkDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkDetailsTable
     */
    public $WorkDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WorkDetails',
        'app.Employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WorkDetails') ? [] : ['className' => WorkDetailsTable::class];
        $this->WorkDetails = TableRegistry::getTableLocator()->get('WorkDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkDetails);

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
