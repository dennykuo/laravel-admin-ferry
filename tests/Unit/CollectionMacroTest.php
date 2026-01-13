<?php

namespace Dennykuo\AdminFerry\Tests\Unit;

use Dennykuo\AdminFerry\Tests\TestCase;
use Illuminate\Support\Collection;

class CollectionMacroTest extends TestCase
{
    /** @test */
    public function recursive_macro_is_registered()
    {
        $this->assertTrue(Collection::hasMacro('recursive'));
    }

    /** @test */
    public function recursive_macro_converts_nested_arrays_to_collections()
    {
        $data = [
            'level1' => [
                'level2' => [
                    'level3' => 'value',
                ],
            ],
        ];

        $collection = collect($data)->recursive();

        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertInstanceOf(Collection::class, $collection->get('level1'));
        $this->assertInstanceOf(Collection::class, $collection->get('level1')->get('level2'));
        $this->assertEquals('value', $collection->get('level1')->get('level2')->get('level3'));
    }

    /** @test */
    public function recursive_macro_handles_simple_arrays()
    {
        $data = ['a', 'b', 'c'];

        $collection = collect($data)->recursive();

        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertEquals('a', $collection->get(0));
        $this->assertEquals('b', $collection->get(1));
        $this->assertEquals('c', $collection->get(2));
    }

    /** @test */
    public function recursive_macro_converts_objects_to_collections()
    {
        $data = [
            'settings' => (object) [
                'theme' => 'dark',
                'locale' => 'zh-TW',
            ],
        ];

        $collection = collect($data)->recursive();

        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertInstanceOf(Collection::class, $collection->get('settings'));
        $this->assertEquals('dark', $collection->get('settings')->get('theme'));
    }

    /** @test */
    public function recursive_macro_handles_mixed_nested_structures()
    {
        $data = [
            'users' => [
                [
                    'name' => 'John',
                    'roles' => ['admin', 'editor'],
                    'meta' => (object) ['verified' => true],
                ],
                [
                    'name' => 'Jane',
                    'roles' => ['user'],
                    'meta' => (object) ['verified' => false],
                ],
            ],
        ];

        $collection = collect($data)->recursive();

        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertInstanceOf(Collection::class, $collection->get('users'));
        $this->assertInstanceOf(Collection::class, $collection->get('users')->get(0));
        $this->assertInstanceOf(Collection::class, $collection->get('users')->get(0)->get('roles'));
        $this->assertInstanceOf(Collection::class, $collection->get('users')->get(0)->get('meta'));
        $this->assertTrue($collection->get('users')->get(0)->get('meta')->get('verified'));
    }

    /** @test */
    public function recursive_macro_preserves_scalar_values()
    {
        $data = [
            'string' => 'test',
            'number' => 123,
            'boolean' => true,
            'null' => null,
            'float' => 3.14,
        ];

        $collection = collect($data)->recursive();

        $this->assertEquals('test', $collection->get('string'));
        $this->assertEquals(123, $collection->get('number'));
        $this->assertTrue($collection->get('boolean'));
        $this->assertNull($collection->get('null'));
        $this->assertEquals(3.14, $collection->get('float'));
    }

    /** @test */
    public function recursive_macro_handles_empty_collections()
    {
        $collection = collect([])->recursive();

        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertTrue($collection->isEmpty());
    }

    /** @test */
    public function recursive_macro_handles_deeply_nested_structures()
    {
        $data = [
            'a' => [
                'b' => [
                    'c' => [
                        'd' => [
                            'e' => [
                                'f' => 'deep value',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $collection = collect($data)->recursive();

        $deepValue = $collection
            ->get('a')
            ->get('b')
            ->get('c')
            ->get('d')
            ->get('e')
            ->get('f');

        $this->assertEquals('deep value', $deepValue);
    }
}
