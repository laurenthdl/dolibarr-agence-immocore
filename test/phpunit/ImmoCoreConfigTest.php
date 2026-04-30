<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/../../core/modules/modImmocore.class.php';

class ImmoCoreTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function moduleClassShouldExist(): void
    {
        $this->assertTrue(class_exists('modImmocore'));
    }

    /** @test */
    public function moduleShouldHaveCorrectNumber(): void
    {
        $ref = new ReflectionClass('modImmocore');
        $prop = $ref->getProperty('numero');
        $prop->setAccessible(true);
        $this->assertEquals(700000, $prop->getValue(new modImmocore((object)[])));
    }
}
