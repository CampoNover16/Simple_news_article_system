<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsAuthorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsAuthorTable Test Case
 */
class NewsAuthorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsAuthorTable
     */
    protected $NewsAuthor;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.NewsAuthor',
        'app.NewsAuthors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NewsAuthor') ? [] : ['className' => NewsAuthorTable::class];
        $this->NewsAuthor = $this->getTableLocator()->get('NewsAuthor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NewsAuthor);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NewsAuthorTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
