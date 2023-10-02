<?php
//// array and chain of data are not the same
class Node{
	private mixed $data;
	private Node|null $next; //field just delear and don't assign
	public function __construct(/*field to paramter*/){
      $this->data  = 0; // the node data is the identifier 
      $this->next  = null;///properties
      $this->feature  = ['name'=>'default','age'=>'time of object creation','id'=>$this->data];
	}

	public function __toString(){

		return "<Node $this->data>";
	}

    public function setNext(Node $node):void{
       $this->next  = $node;
    }

    public function getNext():Node|null{
      return $this->next;  
    }

     public function setData(int $data):void{
       $this->data = $data;
    }

    public function getData():int{
      return $this->data;
    }
}
/////this is basic principle behind master slave archi; head is the first node is the master
$n  = new Node();
$n2  = new Node();
$n3  = new Node();
$n4  = new Node();
$n5  = new Node();
$n->setData(10);
$n2->setData(20);
$n3->setData(40);
$n4->setData(17);
$n5->setData(175);
// $n->setNext($n2);
// $n2->setNext($n3);
//Node list is array of node [$n1,$n2,$n3];

echo $n3->getNext();

class LinkedList{
	private Node|null $head;
	private int $size;
	
    
	public function __construct()
	{
		$this->head  = null; 
		$this->size  = 0;

	}
    
   ////////////////////3 mode of insert head tail position
   public function insertfromHead(Node $node)
   {
   	  echo $node;
       $current    = $node;
       if($this->head  === null){
       	$this->head  = $current;
       }else{
        ////switching position
         $previous  = $this->head;
         $this->head  = $current;
         $current->setNext($previous);
        
       }


   }

   public function insertfromTail(Node $node)
   {
   	  if(!$this->head){
   	  	$this->head  = $node;  	
   	  }else{
   	  	 $current = $this->head;
   	  	 while($current->getNext()){
   	  	 	//$this->size++;
   	  	 	$current  = $current->getNext();
   	  	 }
   	  	 $current->setNext($node);

   	  }


   }	


 public function insertAtPosition(Node $whereToInsertNode,Node $nodeToInsert)
   {
   	  if($this->head){
   	  	$current = $this->head;
   	  	$previous  = null;

   	  	 while($current->getData()!==$whereToInsertNode->getData() && $current){ 
   	  	 	 echo "while called\n";
            $previous  = $current;//saving the current
   	  	  	$current  = $current->getNext();
   	  	 }
   	  	 echo $previous."\n";


   	  	 if($current->getData()=== $whereToInsertNode->getData()){
   	  	 	 if( $previous){
   	  	 	 $previous->setNext($nodeToInsert); //a=b b=c then a=c ==> transitive law
   	  	 	 $nodeToInsert->setNext($current);
           echo "PRV\n";
   	  	 	 }else{
   	  	 	 	///////////////take care of the remaining
   	  	 	 	$previous = $nodeToInsert;
   	  	 	 	$previous->setNext($current);
   	  	 	 	$this->head  = $previous ;
            echo "NO PRV\n";
   	  	 	 }

   	  	 }


   	  	
     }
   	  
	}
  /////////////////////////////////////

 public function deleteNode(Node $nodeToDelete)
   {
      if($this->head){
        $current = $this->head;
        $previous  = null;

         while($current->getData()!==$whereToInsertNode->getData() && $current){ 
           echo "while called\n";
            $previous  = $current;//saving the current
            $current  = $current->getNext();
         }
        

           if($current->getData()=== $nodeToDelete->getData()){
              
               if($previous){
                 $previous->setNext($current->getNext());
              unset($current);
            }else{
             
              $this->head  = $current->getNext();
              unset($current);

           }
        }


        
     }
      

/////////////////////////////////////////

   }
/*
relations include symmetry, transitivity, and reflexivity
*/

   public function getSize(){
   	$current = $this->head;
   	  	 while($current){
   	  	 	$this->size++;
   	  	 	$current  = $current->getNext();
   	  	 }
   	 return $this->size;
   }
   public function __toString(){
   	 $list  =" ";
     if($this->head){
       $list .="[head: $this->head";
       $current  = $this->head->getNext();
     
      // echo $current;
      // echo $current->getNext();
      // echo $current->getNext()->getNext();
      // echo $current->getNext()->getNext()->getNext();
     while($current){
     	$list .=" -> $current ";
        $current  = $current->getNext();
        if(!$current){
        	 $list .=" -> $current ] ";
        }
       
     	
     }

     }



  return $list;
   }
   

}





$l  = new LinkedList();
$l->insertfromHead($n);
$l->insertfromHead($n2);
$l->insertfromTail($n4);
$l->insertfromHead($n3);
$l->insertAtPosition($n2,$n5);

echo $l;
echo $l->getSize();
//////////////////////////////////////////////////////////////////////////////////////



class Node2{
	private mixed $data;
	private Node|null $next; //field just delear and don't assign
	private Node|null $previous;
	public function __construct(/*field to paramter*/){
      $this->data  = 0; // the node data is the identifier 
      $this->next  = null;///properties
      $this->feature  = ['name'=>'default','age'=>'time of object creation','id'=>$this->data];
	}

	public function __toString(){

		return "<Node $this->data>";
	}

    public function setNext(Node $node):void{
       $this->next  = $node;
    }

    public function getNext():Node|null{
      return $this->next;  
    }


     public function setPrevious(Node $node):void{
       $this->next  = $node;
    }

    public function getPrevious():Node|null{
      return $this->previous;  
    }

     public function setData(int $data):void{
       $this->data = $data;
    }

    public function getData():int{
      return $this->data;
    }
}

class DoubleLinkedList{
	private Node|null $head;
	private Node|null $tail;
	public function __construct()
	{
		$this->head  = null;
		$this->tail  = null; 
	}
    
   ////////////////////3 mode of insert head tail position
   
   public function clear():void{
   	$current  = $this->head;
   		while($current){
   			$next  = $current->getNext();
   			$current->setNext(null);
   			$current->setPrevious(null);
   		}
   		$current=$this->head=$this->tail=null;
   }


   public function __toString(){
   	 $list  =" ";
     if($this->head){
       $list .="[head: $this->head";
       $current  = $this->head->getNext();
     
      // echo $current;
      // echo $current->getNext();
      // echo $current->getNext()->getNext();
      // echo $current->getNext()->getNext()->getNext();
     while($current){
     	$list .=" -> $current ";
        $current  = $current->getNext();
        if(!$current){
        	 $list .=" -> $current ] ";
        }
       
     	
     }

          $list .="[tail: $this->tail";

     }



  return $list;
   }
   

}