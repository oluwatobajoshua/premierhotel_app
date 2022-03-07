<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChildrenDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChildrenDetailsTable Test Case
 */
class ChildrenDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChildrenDetailsTable
     */
    public $ChildrenDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ChildrenDetails',
        'app.Employees',
        'app.Genders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ChildrenDetails') ? [] : ['className' => ChildrenDetailsTable::class];
        $this->ChildrenDetails = TableRegistry::getTableLocator()->get('ChildrenDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChildrenDetails);

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
