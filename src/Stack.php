<?php

require_once 'StackInterface.php';


/**
 * This stack is implemented using PHP arrays.
 * The php array functions are also used, although I know the array_shift operation
 * is not very efficient; its cost in big O notation is O(n).
 *
 * @author Oscar Pascual <oscar.pascual@gmail.com>
 */
class Stack implements StackInterface
{

    protected $stack;


    /**
     * Create a new stack (an array) without elements in it.
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     */
    public function __construct()
    {
        $this->stack = array();
    }


    /**
     * Returns a boolean indicating wether the stack is empty or not.
     * (true = empty)
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return count($this->stack) == 0;
    }


    /**
     * Push an element into the stack using PHP simple array notation.
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @param Mixed $element
     * @return boolean
     */
    public function push($element): bool
    {
        //Following PHP documentation, this is better than using array_push.
        $this->stack[] = $element;
        return true;
    }


    /**
     * Get the first element on top of the stack without actually deleting it
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return Mixed
     */
    public function top()
    {
        //What if we perform a top on an empty stack?  Throw exception.
        if ($this->isEmpty()) {
            throw new EmptyStackException("Stack is empty");
        }

        //Just return the last element of the stack without eliminating it
        return $this->stack[array_key_last($this->stack)];
    }


    /**
     * Get the first element on top of the stack.
     * Return the last element of the array and delete it.
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return Mixed
     */
    public function pop()
    {
        //What if we perform a pop on an empty stack?  Throw exception.
        if ($this->isEmpty()) {
            throw new EmptyStackException("Stack is empty");
        }

        //Just return the last element and eliminate it from the stack (array_pop)
        return array_pop($this->stack);
    }


    /**
     * Eliminate all the stack elements.
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return void
     */
    public function purge(): void
    {
        $this->stack = array();
    }


    /**
     * Returns the number of elements in the stack
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return integer
     */
    public function count(): int
    {
        return count($this->stack);
    }


    /**
     * Just a help function to print out the stack
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return void
     */
    public function print(): void
    {
        $count = $this->count();
        for ($i=0; $i < $count; $i++) {
            print_r($this->stack[$i]);
            echo "\n";
        }
    }


    /**
     * Bonus function 1 (not in Interface contract)
     * Returns a boolean indicating whether the element is in the stack or not.
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return boolean
     */
    public function contains($element): bool
    {
        return in_array($element, $this->stack);
    }


    /**
     * Bonus function 2 (not in Interface contract)
     * Another help function that returns an array, instead of an object of type Stack.  Very handy.
     *
     * @author Oscar Pascual <oscar.pascual@gmail.com>
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->stack;
    }

}
?>