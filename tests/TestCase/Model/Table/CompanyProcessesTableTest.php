<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyProcessesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyProcessesTable Test Case
 */
class CompanyProcessesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyProcessesTable
     */
    public $CompanyProcesses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CompanyProcesses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CompanyProcesses') ? [] : ['className' => CompanyProcessesTable::class];
        $this->CompanyProcesses = TableRegistry::getTableLocator()->get('CompanyProcesses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompanyProcesses);

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
