<?php

/*
 Treaded Binary Tree
     -----------------------------------------
      left | lThreaded | data | rThreaded| right
     ---------------------------------------- 
Single Threaded Binary Tree: Here only the right NULL pointer are made to point to inorder successor.

Double Threaded Binary Tree: Here both the right as well as the left NULL pointers are made to point inorder successor and inorder predecessor respectively. (here the left threads are helpful in reverse inorder traveral of the tree )

*/

class BinaryNode
{
    
    public function __construct($data)
    {
        $this->left  = null; ///predecessor info save in it if null
        $this->lThreaded   = 1; /// have no child// mean pointing to inorder predecessor
        $this->data  = $data ? $data : 'null';
        $this->right  = null; ///successor info save in it if null
        $this->rThreaded   = 1; //have no child // mean pointing to inorder successor
        /// store information in the letf and right pointer
        //NOTE IT IS ELEMENT THAT HAS NOT CHILD THAT HAS THREAD =1; 
        // THAT IS WHY LEAVE NODE IS A THREADED NODE 
        /*
                  threaded binary tree type 
                    1. Single with left predecessor or right successor
                    2. with both

                    inorder => left -.parent  right
                  Analysis ===> 
                    Look for all Node that their left or right is NULL
                    Keep the left most and right most null pointer as null

                    let's us say for some node right pointer is pointing to some node and righThread is set to true, this means that it is pointing to it's children, but if in the same case if rightThread is set to false this means that it is pointing to it's parent node (and not child ).
                    
                  Parent  
                   /\
                   ||    / === threaded  = 0 mean Node is pointing to parent
                   ||   / 
                   Node                
                    |   \
                   / \   \====   threaded = 1  mean Node pointing to right child 
                  /   \     
                     \|/  
                     right
             
Applications of Threaded Binary Tree
The idea of threaded binary trees is to make inorder traversal of the binary tree faster and do it without using any extra space, so sometimes in small systems where hardware is very limited we use threaded binary tree for better efficiency of the software in a limited hardware space.           
        */    
    }
}




function threadedWrapper(){

    class ThreadedBinaryTree{

        public function __construct()
    {
        $this->root  = null;
        // $this->dummy  = null;
        // $this->dummy->right  = null;
        // $this->dummy->rThreaded  = 1;

    }

     public function insert($data)
    {
        $this->_insert($this->root, $data);
    }

        private function _insert(&$root,$data){

            $node  = new BinaryNode($data);
            if($root === null){
                $root  = $node;
                return true;
            }
             // rule : no stack or queue inplementation

           $cur  =$root;
           $parent  = null;
           while($cur !== null){
           
             if($data  == $cur->data){
                break;
             }
                  //////////////////////////////// find cur that will receive the incoming element
             
                 if($data < $cur->data){
                        
                      if($cur->lThreaded ===0 ){///if left child contnue to left 
                         
                        $cur = $cur->left;
                       
                      }else{
                        break;
                      }
                    
                 }else if($data > $cur->data){
                      $cur->data."\n";
                       $cur->lThreaded."\n";
                      if($cur->rThreaded ===0 ){///if right child contnue to right
                        $cur =  $cur->right;
                      }else{
                        break;
                      }
                    
                 }
            }///////////////end of while loop   
        
            $parent  = $cur;
             ////////// //////////////////////
             $node   = new BinaryNode($data) ;
           
                if ($data < ($parent->data)) {  /*a=b c=d b=e and  (a=e & c=d)  */

                       $node->left = $parent->left;    
                       $node->right = $parent; 
                       $parent->left = $node; 
                       $parent->lThreaded = 0; 
                      
                  }

               if ($data > ($parent->data)) {  /*a=b c=d b=e and  (a=e & c=d)  */
                 
                       $node->right = $parent->right;    
                       $node->left = $parent; 
                       $parent->right = $node; 
                       $parent->rThreaded = 0;
                  }  

               
            
          // }  //////////////// while
               // print_r($parent);
            //exit();


        }

    
      public function transversal($root = null,$type = 'insuc')
    {   $root_  = $root === null?$this->root:$root;
        if($type == 'insuc') return  $this->inOrderSuccssor_($root_);
        if($type == 'inpre') return  $this->inOrderPrede_($root_);

    }
    private function inOrderSuccssor_(&$root)
    { 
        // Returns inorder successor using left
       // and right children (Used in deletion)
        //: If P has a no right subtree rThreaded =1, then return the light child of P rThreaded ==0

    if($root->rThreaded === 1){///whenever the root is threaded (point to succssor) return the right  
        return $root->right;
    }else{

        $cur  = $root->right;
        while($cur->lThreaded === 0 ){//if the left subroot exit go on to left
            $cur  = $cur->left;
        }
        return   $cur ;
    } 
  }
     private function inOrderPrede_(&$root)
    {
    

    if($root->lThreaded === 1){///whenever the root is threaded (point to succssor) return the right  
        return $root->left;
    }else{

        $cur  = $root->left;
        while($cur->lThreaded === 0 ){//if the left subroot exit go on to left
            $cur  = $cur->right;
        }
        return   $cur ;
    } 


    }  


  private function leftMost_(&$root)
    {   $leftMost =null;
       
        if($root === null){
            return $leftMost;
        }
        $cur  = $root; 
        while($cur->lThreaded === 0){
                 $cur  = $cur->left; 
                 if($cur->lThreaded ===1){ ///left most
                    $leftMost  =$cur;
                 }              
         } 

    return $leftMost;
}

public function inOrderTransversal($root){
    $p  = $this->inorderSuccessor($root);
    // echo $p->data;
    // exit();
   $res  = [];
    $count  = 0;
    while($p->data !== $root->data){
        $p  = $this->inorderSuccessor($p);
        array_push($res,$p->data);
        if($count ==4) break; 
        $count++;

    }
  
   return $res;
}

private function inorderSuccessor($root){
      // $root  = $this->search($data);
      
     if($root->rThreaded === 1){  //// no right subtree return right child
        return $root->right;
     }else{
        $cur  = $root->right;
        while($cur->lThreaded === 0){
        /// right subtree is present go look for sucessessor through right
            $cur = $cur->left;
        }
        return $cur;
     }
}
function checkTree(){
    return $this->checkTree_($this->root);
}
private function checkTree_(&$root){
 static $res  = [];
    $q  = [$root];
   if($root === null){
    return [];
   }
   $c =0;
   while (!empty($q)){
    
      $cur  = array_shift($q);
       if($cur->data === $root->data && $c > 1){
        break;
     }

     $c++;
      array_push(
          $res,
          [
            'data'=>$cur->data,
            'lThreaded'=>$cur->lThreaded,
            'rThreaded'=>$cur->rThreaded,
          ]
);

      if($cur->left !== null){
        array_push($q,$cur->left);
      }
       
       if($cur->right !== null){
        array_push($q,$cur->right);
      }

   

   }

   return $res;

   
}

  private function rightMost_(&$root)
    {   $rightMost =null;
        
        if($root === null){
            return $rightMost;
        }
        $cur  = $root; 
        while($cur->rThreaded === 0){
                 $cur  = $cur->left; 
                 if($cur->rThreaded ===1){ ///left most
                    $rightMost  =$cur;
                 }              
         } 

         return $rightMost;
}

 public function inorder(){
        return $this->inorder_($this->root);
    }
    private function inorder_(&$root)
    {   $res  = [];
        $leftMost  = [];
       
        if($root === null){
            return $res;
        }

        $cur  = $root; 
        array_push($res,$root->data);
        $c  = 0;
        while($cur->lThreaded === 0){
                 $cur  = $cur->left; 
                 if($cur->lThreaded ===1){ ///left most
                    array_push($leftMost,$cur->data.' lM');
                 }              
               array_push($res,$cur->data.' l');
         } 
         while($cur->rThreaded === 0){
                 $cur  = $cur->right;
                 array_push($res,$cur->data." r");
         }  

        return ['res'=>$res,'lm'=>$leftMost];

    }
    
    public function  search($data){
         return $this->search_($this->root,$data);

    }

    private function search_(&$root,$data){
        
        $cur  = $root;
        while($cur !== null){
            if($cur->data === $data){
                return $cur;
            }elseif($cur->data > $data){
                $cur  = $cur->left;
            }else{
                $cur   = $cur->right;
            }

        }

        return null;
    }

    }

// $t = new ThreadedBinaryTree();
// $t->insert(1);
// $t->insert(3);
// $t->insert(5);
// $t->insert(7);
// $t->insert(12);
// $t->insert(2);
// $t->insert(10);
// $t->insert(6);
// $t->insert(8);

//print_r($t->inorder($t->root));

$t2 = new ThreadedBinaryTree();
$t2->insert(50);
$t2->insert(30);
$t2->insert(60);
$t2->insert(20);
$t2->insert(40);

$t2->insert(10);
$t2->insert(19);
$t2->insert(6);
$t2->insert(8);
//print_r($t2->inorder($t2->root));
//print_r($t2->inOrderTransversal($t2->root));
echo"=======================================";
print_r($t2->checkTree());
//print_r($t->transversal($t->root->right->left,"inpre")->data);
// echo "\n";
// echo $t2->root->data;
//  echo "\n";
//  echo $t2->root->left->left->left->right->data;
// echo "\n";
 //echo $t2->root->right->right->left->data;

/*
                50
               / \
              30  60
             / \ 
           20  40 
          /\       
         10
        / \
       6  19

              a
             / \
            b   c
           /\   /\
          f  g d e
              \
               h                     
      h d b e a c f g   
      f b g h
cloud computing concepts, models and services
*/

}

threadedWrapper();





function wrapper() {



$root  = new BinaryNode(3);
$root->left  =  new BinaryNode(4);
$root->right  = new BinaryNode(5);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);




/// Now the threade
$root2  = new BinaryNode(3);
$root2->lThreaded  = 1;
$root2->rThreaded = 1;
$root2->left  =  new BinaryNode(4);
$root2->left->lThreaded  = 1;
$root2->left->rThreaded = 1;

$root2->right  = new BinaryNode(5);
$root2->right->lThreaded  = 1; ///pointing to a node
$root2->right->rThreaded = 1;

$root2->left->left  =  new BinaryNode(6);
$root2->left->right  =  new BinaryNode(7);
$root2->right->left  =  new BinaryNode(8);
$root2->right->right  =  new BinaryNode(9);

$root2->left->left->left  =  new BinaryNode(10);
$root2->left->left->left->lThreaded  = 0; ///pointing to no node
$root2->left->left->left->rThreaded  = 0; /// didn't ponint to any node

$root2->left->left->right  =  new BinaryNode(11);
////NULL pointiong 
$root2->left->left->left->right   =  $root2->left->left; //right of 10 point to 6
$root2->left->left->right->left   = $root2->left->left; //left of 11 point to 6
$root2->left->left->right->right  = $root2->left; // right of  11 point to 4
$root2->left->right->left         = $root2->left; //left of 7 point to 4
$root2->left->right->right        = $root2; //right of 7 point to 3
$root2->right->left->left         = $root2; //left of 8 point to 3
$root2->right->left->right        = $root2->right; //right of 8 point to 5
$root2->right->right->left        = $root2->right; //left of 9 point to 5

$dummy_node = new BinaryNode(null);
$dummy_node->lThreaded = 1;
$dummy_node->rThreaded = 1;
$root2->left->left->left->left  = $dummy_node->left; // left of  10 is ponting to left of dummy node
$dummy_node->right   = $dummy_node->right; ////right of the dummy Node is pointing to itself
//   Left Most Null<-- 10--> 6 <-- 11 --> 4 <-- 7 --> 3 <-- 8 ---> 5 <-- 9 --->Right Most Null
/*



           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      /\ 
    10  11
    preorder
*/

/*                            --------------
                                L  | 3 | R
                               -------------
                              /           \
                 ------------              -------------
                L |  4 | R                 L  |  5  | R
                -----------                -------------   
                            
                /         \                    /         \    
                       
        ------------    -------------      ------------   -------------
        L |  6 | R       L  |  7  | R        L | 8 | R      L | 9 | R
        -----------      -------------      -----------   -------------                  
                
        /     \
        
-----------      ------------- 
 L  |10 | R        L  | 11| R
-----------      ------------- 
NULL links are replaced with special links known as threads 
Each node in a threaded binary tree either contains a link to its child node or thread(point to predecessor or successor) to other nodes in the tree.



Left most is the 10
and Right most is 9
Go through the node in Inorder Tranverser
  
       Left Most Null<-- 10  6   11  4  7  3  8   5  9 --->Right Most Null
        Predecessor of an element in this Inorder Tranverser is the element before it ( called Inorder predecessor)
        Successor of an element in this Inorder Tranverser is the element aftter it (called Inorder successor)
        The node with Null pointer will point to element before them in the inorder tranversal (Inorder Predecessor pointer)
        The node with Null pointer will point to element afeter them in the inorder tranversal (Inorder Successor pointer)
        In this way each node is saving the address of their parent

        Left Most Null<-- 10--> 6 <-- 11 --> 4 <-- 7 --> 3 <-- 8 ---> 5 <-- 9 --->Right Most Null



                    
*/

//var_dump($root2);

$root_bst  = new BinaryNode(5);
$root_bst->left  =  new BinaryNode(3);
$root_bst->right  = new BinaryNode(7);

$root_bst->left->left  =  new BinaryNode(2);
$root_bst->left->right  =  new BinaryNode(4);

$root_bst->right->left  =  new BinaryNode(6);
$root_bst->right->right  =  new BinaryNode(9);

$root_bst->right->right->left  =  new BinaryNode(8);
$root_bst->right->right->right  =  new BinaryNode(10);

$root_bst->left->left->left  =  new BinaryNode(1);

function inOrderSucBST($root,$data){
    $suc=null;
 while($root !== null){
    if($root->data <= $data){
        $root =  $root->right;
    }else{
        $suc  = $root;
        $root = $root->left;
    }
 } 
 if($suc !== null){
   return [$suc->data ];   
 }else{
    return [];
 }

 /*
   static $res  = [];
  if($root === null)
  {
    return $res;
  }
   inOrderSucBST($root->right,$data);
    $res[$root->data] = $root->data;
   inOrderSucBST($root->left,$data);

    return array_key_exists($data+1,$res)?[$res[$data+1]]:[];
   
   */
}        

//print_r(inOrderSucBST($root_bst,8));

function lnorderSuccessor($root)
{
///successor is the right child
///  
/*

    [0] => 4-------
    [1] => 8
    [2] => 10------
    [3] => 12
    [4] => 14---------
    [5] => 20
    [6] => 22------

           3
          / \
         4   5 
        /\   /\
       6  7 8  9
      /\ 
    10  11
    preorder
 Left Most Null<-- 10--> 6 <-- 11 --> 4 <-- 7 --> 3 <-- 8 ---> 5 <-- 9 --->Right Most Null


*/  
    if ($root->rThreaded === 0) { ///if the next right is the inorder successor
        return $root->right;
    } else { /// it has right childe
        $current  = $root->right; //  go the the next successor
        while ($current->lThreaded == 1) {///if the current is having left child
            $current  = $current->left; /// continue going to the left
        }

          return $current;  //the last will be successor
    }
}

//print_r(lnorderSuccessor($root2));

function inserInorderRightTran($root, $data)
{
    $node  = new BinaryNode($data);
    $node->right  = $root->right;
    $node->rThreaded   = $root->rThreaded;
    $node->left   = $root;
    $node->lThreaded   = 0;
    $root->right  =  $node;
    $root->rThreaded  = 1;
    if ($node->rThreaded === 1) {
        $temp    =  $node->right;
        while ($temp->lThreaded) {
            $temp  = $temp->left;
        }
        $temp->left  = $node;
    }
}


function insert($root,$data){
 $temp;
 $parent = null;
 $current  = $root;
 $found  = 0;
 while($current !== null){
    if($data  ==  $current->data ){
        $found  = 1;
        echo "duplicate entry ";
        return;
    }
    $parent  = $current;

     if ($data < $current->data) {
           if ($current->lThreaded == false)//not pointing to predeccessor
            {
               $current = $current ->left;
               $parent  = $current;    
            } else   {
             break; 
          }
          
               
    }else {
           if ($current->rThreaded == false)  // not ponting to its successor
           {
            $current = $current ->right;
                 $parent  = $current;
             }
                 
           else{
               break;
             }
       }
    
   }////////end of while loop

  $node  = new BinaryNode($data);
  $node->data   = $data;
  $node->lThreaded  = true; ///is pointing to its predeccessor
  $node->rThreaded  = true; /// is pointing to its successor;
  
  if($parent === null){
    $node  = $parent;
  }
else if ($data < ($parent->data)) {  /*a=b c=d b=e and  (a=e & c=d)  */
       $node->left = $parent->left;    
       $node->right = $parent; 
       $node->lthread = false;
       $parent->left = $node; 
       /*part-L=>Nod->L */
   }else { 
        $node->right = $parent->right;
        $node->left =$parent;
        $parent->rthread = false;
        $parent->right = $node;
   }

}

//inserInorderRightTran($root2, 40);
 $root__  = new BinaryNode(35);
$a  = [32, 1, 4, 3, 3, 3, 23, 2, 3, 3, 3, 567, 67];

foreach($a as $b){
inserInorderRightTran($root__, $b);    
}
//print_r( $root__ );


//print_r (lnorderSuccessor($root__)->data);
// /print_r(lnorderSuccessor($root__->left)->data);



function createthreadedBinaryTree($root)
{
    if ($root === null) {
        return null;
    }

    if ($root->left === null && $root->right === null) {
        return $root;
    }

    if ($root->left !== null) {
        $lastNodetoTheLeft  = createthreadedBinaryTree($root->left);

        $lastNodetoTheLeft->right  = $root;
        $lastNodetoTheLeft->lThreaded  = 1;
    }

    if ($root->right !== null) {
        $lastNodetoTheLeft  = createthreadedBinaryTree($root->right);
        $lastNodetoTheLeft->left  = $root;
        $lastNodetoTheLeft->rThreaded  = 1;
    }

    return $root;
}


} //end of wrapper




function teste(){
/*            a
             / \
            b   c
           /\   /\
          f  g d  e
              \
               h 
               //////
  f g h d e             
 Array 3
(
    [0] => f
    [1] => b
    [2] => g
    [3] => h
    [4] => a
    [5] => d
    [6] => c
    [7] => e
)

*/
$root  = new BinaryNode('a');
$root->left  =  new BinaryNode('b');
$root->right  = new BinaryNode('c');
$root->left->left  =  new BinaryNode('f');
$root->left->right  =  new BinaryNode('g');
$root->left->right->right  =  new BinaryNode('h');
$root->right->left  =  new BinaryNode('d');
$root->right->right  =  new BinaryNode('e');
// $root->left->left->left  =  new BinaryNode(10);
// $root->left->left->right  =  new BinaryNode(11);
  function tranverse($root)
{
    if ($root === null) {
        return [];
    }
    static $res  = [];

    tranverse($root->left);
     array_push($res, $root->data);
    tranverse($root->right);
   
    return $res;
}

print_r(tranverse($root));
}

//teste();



