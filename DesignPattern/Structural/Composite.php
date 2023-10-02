<?php


/*
The Composite pattern is a structural design pattern that allows you to compose objects into tree structures to represent part-whole hierarchies. Composite objects can be treated the same way as individual objects of the same type.


The pattern has two main components: (the component interface), which defines the interface for the objects in the composition,
(and the leaf and composite classes), which implement the component interface


An example of using the Composite pattern would be a file system, where files and directories are represented as objects. Both files and directories implement the same interface, which allows them to be treated the same way by the client. The directories, however, can contain other files and directories, creating a tree-like structure.

interface Component {
    public operation():void;
}

class Leaf implements Component {
    public void operation() {
        // do something
    }
}

class Composite implements Component {
    private List<Component> children = new ArrayList<Component>();
    public void operation() {
        for (Component child : children) {
            child.operation();
        }
    }
    public void add(Component child) {
        children.add(child);
    }
    public void remove(Component child) {
        children.remove(child);
    }
}
  

 two classes composite class recive a list of second class  
 class component==> implement interface
       ||
       ||
     Pass as list of 
     Composite class  

  interface ===> class that implements interface ==> class that receive the list of previous class 
 */
interface Component {
    public operation():void;
}

class Leaf /*the type of leaf is Component*/implements Component {
	 function __construct(int $id){
	 	$this->id  = $id
	 }
    public  operation():void {
        // do something
    }
}

class Node /*is the composite class*/{
	 private $list = [];
 
   function __construct(){
   	$this->list  = $list;
   }

    public function add(Component $child) {
        $this->list  = [...$this->list,$child]
    }
    public function remove(Component $child) {
       
       $filter    = function($arr){
              return  $arr->id !== $child->id;
       }

       $this->list  = array_filter($this->list $filter);
    }
}