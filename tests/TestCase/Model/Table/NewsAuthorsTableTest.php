<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsAuthorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsAuthorsTable Test Case
 */
class NewsAuthorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsAuthorsTable
     */
    protected $NewsAuthors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.NewsAuthors',
        'app.News',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NewsAuthors') ? [] : ['className' => NewsAuthorsTable::class];
        $this->NewsAuthors = $this->getTableLocator()->get('NewsAuthors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NewsAuthors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NewsAuthorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NewsAuthorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
