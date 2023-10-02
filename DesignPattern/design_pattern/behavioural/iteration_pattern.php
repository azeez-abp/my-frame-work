<?php

interface Iterator
{
    public function hasNext(): bool;
    public function next();
}

/*
This interface defines two methods: hasNext() and next(). The hasNext() method checks if there are any more elements left to traverse, while the next() method returns the next element.
*/

class ConcreteIterator implements Iterator
{
    private array $data;
    private int $position = 0;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function hasNext(): bool
    {
        return isset($this->data[$this->position]);
    }

    public function next()
    {
        if (!$this->hasNext()) {
            throw new Exception("No more elements left to traverse.");
        }

        $element = $this->data[$this->position];
        $this->position++;

        return $element;
    }
}




$data = ["apple", "banana", "cherry"];
$iterator = new ConcreteIterator($data);

while ($iterator->hasNext()) {
    echo $iterator->next() . "\n";
}