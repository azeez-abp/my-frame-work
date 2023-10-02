<?php

use SebastianBergmann\CodeCoverage\Report\Html\Renderer;

/**
 * The Composite Design Pattern is a structural pattern that allows you to
 * compose objects into tree structures to represent part-whole hierarchies
 * we need Object as leaf
 * we need tree, that has a data field for holding leaf, method for adding, removing and viewing the leaf
 * use in hierachy structure
 */

interface Renderable
{
    public function render(): string;
}

// Leaf
class Text implements Renderable
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return $this->text;
    }
}

// Composite
class Page implements Renderable
{
    ///combiner class is  the same type as their component
    private $title;
    private $content = [];

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function add(Renderable $renderable)
    {
        $this->content[] = $renderable;
    }

    function remove(int $pos)
    {
        if (array_key_exists($pos, $this->content)) {

            $filter  = function ($eachKey) use ($pos) {
                return $eachKey !== $pos;
            };

            $this->content =   array_filter($this->content, $filter, ARRAY_FILTER_USE_KEY);
        }
    }

    public function render(): string
    {
        $output = "<html><head><title>{$this->title}</title></head><body>";
        foreach ($this->content as $renderable) {
            $output .= $renderable->render();
        }
        $output .= "</body></html>";
        return $output;
    }
}

// Client code
$text1 = new Text("Hello");
$text2 = new Text("World");
$page = new Page("My Page");
$page->add($text1);
$page->add($text2);

$page->remove(0);

echo $page->render();


/*
In this example, the Renderable interface is the Component, and the Text class is the Leaf. The Page class is the Composite, which has an array of child components that may be other Composite objects or Leaf objects.

The client code creates instances of the Leaf objects and the Composite object, and adds the Leaf objects to the Composite object. The client code then calls the render() method on the Composite object to render the entire tree of objects. The render() method of the Composite object calls the render() method on each of its child objects to recursively render the entire tree of objects.
*/