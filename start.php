<?php

require_once './src/Stack.php';


// Create the stack
$stack = new Stack();


// Insert some elements
$stack->push("Element 1");
$stack->push("Element 2");
$stack->push("Element 3");
$stack->push("Element 4");
$stack->push("Element 5");
$stack->push("Element 6");
$stack->push("Element 7");
$stack->push("Element 8");
$stack->push("Element 9");
$stack->push("Element 10");
$stack->push("Element 11");
$stack->push("Element 12");
$stack->push("Element 13");
$stack->push("Element 14");
$stack->push("Element 15");
$stack->push("Element 16");
$stack->push("Element 17");
$stack->push("Element 18");
$stack->push("Element 19");
$stack->push("Element 20");

// Our stack should now have 7 elements
echo "The stack has ".$stack->count()." elements.\n";

// Let's print out the stack
$stack->print();


// Let's pop some elements.  It should be "Element 20" and "Element 19".
$element1 = $stack->pop();
echo "I have popped out \"".$element1."\"\n";
$element2 = $stack->pop();
echo "I have popped out \"".$element2."\"\n";
?>