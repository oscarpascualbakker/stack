<?php

use \PHPUnit\Framework\TestCase;


class StackTest extends TestCase
{

    protected static $stack;


    /**
     * Set the stack for all the tests.
     * The Stack is autoloaded (see composer.json).
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        static::$stack = new Stack;
    }


    public function test_new_stack_is_empty()
    {
        $this->assertTrue(static::$stack->isEmpty());
    }


    public function test_an_item_is_added_to_the_stack()
    {
        static::$stack->push("Test item");
        $this->assertEquals(1, static::$stack->count());
    }


    public function test_an_item_is_contained_in_the_stack()
    {
        $this->assertTrue(static::$stack->contains("Test item"));
    }


    public function test_an_item_is_top_from_the_stack_without_deleting()
    {
        $item = static::$stack->top();

        $this->assertEquals("Test item", $item);
        $this->assertEquals(1, static::$stack->count());
        $this->assertFalse(static::$stack->isEmpty());
    }


    public function test_an_item_is_removed_from_the_stack()
    {
        $item = static::$stack->pop();

        $this->assertEquals("Test item", $item);
        $this->assertEquals(0, static::$stack->count());
        $this->assertTrue(static::$stack->isEmpty());
    }


    /**
     * Add several elements to the [empty] stack.
     * The stack should extract them "Last In First Out" (LIFO).
     *
     * @return void
     */
    public function test_add_and_pop_elements()
    {
        static::$stack->push("Test item 1");
        static::$stack->push("Test item 2");
        static::$stack->push("Test item 3");
        static::$stack->push("Test item 4");
        static::$stack->push("Test item 5");
        static::$stack->push("Test item 6");
        static::$stack->push("Test item 7");
        static::$stack->push("Test item 8");
        static::$stack->push("Test item 9");
        $this->assertEquals(9, static::$stack->count());

        //And now, pop 3 elements and see if they are "Test item 1",
        // "Test item 2" and "Test item 3".
        $item1 = static::$stack->pop();
        $this->assertEquals("Test item 9", $item1);

        $item2 = static::$stack->pop();
        $this->assertEquals("Test item 8", $item2);

        $item3 = static::$stack->pop();
        $this->assertEquals("Test item 7", $item3);
    }


    public function test_the_stack_is_converted_to_array()
    {
        $array = static::$stack->toArray();
        $this->assertIsArray($array);
    }


    /**
     * Test the capture of an exception.
     * In the previous test there were 6 elements left in the stack.
     *
     * @return void
     */
    public function test_exception_thrown_when_popping_on_empty_stack()
    {
        $this->assertEquals(6, static::$stack->count());
        $this->assertFalse(static::$stack->isEmpty());

        $this->expectException(EmptyStackException::class);
        $this->expectExceptionMessage("Stack is empty");

        static::$stack->purge();
        $item = static::$stack->pop();                   //  <- Exception!!!

        $this->assertEquals(0, static::$stack->count());
        $this->assertTrue(static::$stack->isEmpty());
    }


    /**
     * Eliminate the stack.
     *
     * @return void
     */
    public static function tearDownAfterClass(): void
    {
        static::$stack = null;
    }


}