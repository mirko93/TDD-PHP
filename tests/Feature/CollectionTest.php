<?php

namespace Feature;

use App\Support\Collection;
use ArrayIterator;
use IteratorAggregate;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new Collection([
            'name', 'email', 'company'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'name', 'email',
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals($collection->get()[0], 'name');
        $this->assertEquals($collection->get()[1], 'email');
    }
    
    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }
    
    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new Collection([
            'name', 'email', 'company'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection([
            'name', 'email',
        ]);
        $collection2 = new Collection([
            'name', 'email', 'company'
        ]);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }

    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new Collection([
            'name', 'email',
        ]);

        $collection->add(['company']);

        $this->assertEquals(3, $collection->count());
        $this->assertCount(3, $collection->get());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
           ['username' => 'test'],
           ['username' => 'alex']
        ]);

        $this->assertEquals('[{"username":"test"},{"username":"alex"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new Collection([
            ['username' => 'test'],
            ['username' => 'alex']
        ]);

        $encoded = json_encode($collection);

        $this->assertEquals('[{"username":"test"},{"username":"alex"}]', $encoded);
    }
}
