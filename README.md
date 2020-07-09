# Stack in PHP

I implemented this Stack as a need for a colleague.  He (and I) needed to DFS* a graph, and a stack is a needed element in order to remember what path are we following.

**DFS stands for Depth First Search*

This README.md file describes the implementation of a stack written in PHP.  A stack permits the LIFO operations (Last In - First Out).

## Uses
There are lots of uses for stacks in the real world.  Here just some examples:

* Graph Depth First Search algorithm (this was the meaning for me).
* Recursion support.
* 'Undo' feature for several applications.
* Palindrome finding algorithms.
* Hanoi Towers algorithm.
* ... and much more.

## Implementation
The stack is based on a simple PHP array.  :-)

This is how it works:

[![Stack](https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Lifo_stack.png/350px-Lifo_stack.png)](https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Lifo_stack.png/350px-Lifo_stack.png)

Image credits: Wikipedia

The operations a stack should offer are:

* Push an element.
* Pop an element.
* 'Top' an element (same as Pop but without eliminating the element).
* Check if it is empty.
* Return the number of elements.

Additional operations could be:

* Return the stack as an array.
* Return if a certain element is in the stack.
* Print the stack.


### Cost analysis
Time complexity analysis of this implementation in big O notation.

| Operation | Cost |
|---|---|
| isEmpty | O(1) |
| purge | O(1) |
| count | O(1) |
| push | O(1) |
| pop | O(1) |
| top | O(1) |
| contains | O(n) |

## Installation
First, clone this repository:

```sh
$ git clone https://github.com/oscarpascualbakker/stack.git .
```

Then, run the commands to build and run the Docker image:

```sh
$ docker build -t stack .
$ docker container run -it --rm --name my-stack stack php start.php
```

The output contains the number of elements in the stack, the stack elements itself, and the extraction of two elements for demonstration purposes.

Tests can be run this way:

```sh
$ docker container run -it --rm --name my-stack stack vendor/bin/phpunit ./tests
```

If you would like to modify the code, mount a volume:

```sh
$ docker container run --rm -v $(pwd):/usr/src/stack/ stack php start.php
$ docker container run --rm -v $(pwd):/usr/src/stack/ stack vendor/bin/phpunit ./tests
```


### Comments
Of course, don't hesitate to give me your feedback.  I'm glad to improve it with your help.

### **Cheers!**