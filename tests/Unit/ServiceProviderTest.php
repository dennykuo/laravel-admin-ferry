<?php

namespace Dennykuo\AdminFerry\Tests\Unit;

use Dennykuo\AdminFerry\Tests\TestCase;
use Illuminate\Support\Collection;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_config(): void
    {
        $this->assertNotNull(config('admin-ferry'));
        $this->assertIsArray(config('admin-ferry'));
    }

    /** @test */
    public function it_registers_views(): void
    {
        $this->assertTrue(view()->exists('admin-ferry::carrier'));
        $this->assertTrue(view()->exists('admin-ferry::carrier-ajax'));
    }

    /** @test */
    public function it_registers_collection_recursive_macro(): void
    {
        $this->assertTrue(Collection::hasMacro('recursive'));

        $collection = collect([
            'name' => 'test',
            'nested' => [
                'key' => 'value',
            ],
        ]);

        $result = $collection->recursive();
        $this->assertInstanceOf(Collection::class, $result);
    }

    /** @test */
    public function collection_recursive_macro_works_correctly(): void
    {
        $data = [
            'level1' => [
                'level2' => [
                    'level3' => 'value',
                ],
            ],
        ];

        $collection = collect($data)->recursive();

        $this->assertInstanceOf(Collection::class, $collection->get('level1'));
        $this->assertInstanceOf(Collection::class, $collection->get('level1')->get('level2'));
        $this->assertEquals('value', $collection->get('level1')->get('level2')->get('level3'));
    }
}
