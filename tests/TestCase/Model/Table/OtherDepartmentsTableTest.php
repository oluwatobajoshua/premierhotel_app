<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OtherDepartmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OtherDepartmentsTable Test Case
 */
class OtherDepartmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OtherDepartmentsTable
     */
    public $OtherDepartments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OtherDepartments',
        'app.Employees',
        'app.Departments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OtherDepartments') ? [] : ['className' => OtherDepartmentsTable::class];
        $this->OtherDepartments = TableRegistry::getTableLocator()->get('OtherDepartments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OtherDepartments);

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
