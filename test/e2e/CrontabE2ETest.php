<?php declare(strict_types=1);
namespace e2e;

use function Deployer\set;

class CrontabE2ETest extends AbstractE2ETest
{
    private const RECIPE = __DIR__ . '/contrib/crontab.php';

    protected function setUp(): void
    {
        parent::setUp();

        $this->init(self::RECIPE);
    }

    public function testAddingCrontab() {

        set('crontab:jobs', [
            '* * * * * command-x',
        ]);

        $this->tester->run([
            'crontab:sync',
            '-f' => self::RECIPE,
            'selector' => 'all',
        ]);

        self::assertStringContainsString('command-x: NEW', $this->tester->getDisplay());

        // Run the crontab:sync again to assert the same job won't be added twice
        $this->tester->run([
           'crontab:sync',
           '-f' => self::RECIPE,
           'selector' => 'all',
       ]);

        self::assertStringContainsString('command-x: OK', $this->tester->getDisplay());
    }

    public function testUpdatingCrontab() {

        set('crontab:jobs', [
            '1 * * * * command-y',
        ]);

        $this->tester->run([
            'crontab:sync',
            '-f' => self::RECIPE,
            'selector' => 'all',
        ]);

        self::assertStringContainsString('command-y: NEW', $this->tester->getDisplay());

        set('crontab:jobs', [
            '2 * * * * command-y',
        ]);

        $this->tester->run([
            'crontab:sync',
            '-f' => self::RECIPE,
            'selector' => 'all',
        ]);

        self::assertStringContainsString('command-y: FIX', $this->tester->getDisplay());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->tester->run(['crontab-test:truncate', '-f' => self::RECIPE, 'selector' => 'all']);
    }
}

