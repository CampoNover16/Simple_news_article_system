<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthorTable Test Case
 */
class AuthorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthorTable
     */
    protected $Author;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Author',
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
        $config = $this->getTableLocator()->exists('Author') ? [] : ['className' => AuthorTable::class];
        $this->Author = $this->getTableLocator()->get('Author', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Author);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AuthorTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
