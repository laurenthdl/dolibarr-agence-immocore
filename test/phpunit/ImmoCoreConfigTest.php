<?php

declare(strict_types=1);

require_once __DIR__ . '/../../class/immocoreconfig.class.php';

class ImmoCoreConfigTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function tableElementShouldBeCorrect(): void
    {
        $this->assertTrue(
            class_exists('ImmoCoreConfig'),
            'Classe ImmoCoreConfig deve exister'
        );
    }

    /**
     * @test
     */
    public function moduleClassShouldBeCorrect(): void
    {
        $moduleFile = __DIR__ . '/../../core/modules/modImmocore.class.php';
        $this->assertFileExists($moduleFile);
        $content = file_get_contents($moduleFile);
        $this->assertStringContainsString('class modImmocore', $content);
        $this->assertStringContainsString('numero = 700000', $content);
    }

    /**
     * @test
     */
    public function sqlFileShouldExist(): void
    {
        $this->assertFileExists(__DIR__ . '/../../sql/llx_immo_config.sql');
    }

    /**
     * @test
     */
    public function langFileShouldBeFormattedCorrectly(): void
    {
        $langFile = __DIR__ . '/../../langs/fr_FR/immocore.lang';
        $this->assertFileExists($langFile);
        $content = file_get_contents($langFile);
        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }
            $this->assertMatchesRegularExpression('/^[A-Za-z0-9_-]+=.+$/', $line);
        }
    }
}
