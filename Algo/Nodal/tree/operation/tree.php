<?php

class Node{

    function __construct($data){
        $this->left = null;
        $this->data = $data;
        $this->right = null;
    }
}

class BinaryTree{
   function __construct(){
        $this->root = null;
    }
   function insert($data){
     return $this->_insert($this->root,$data);
   }
    private  function _insert(&$root,$data){
        $node = new Node($data);
        if($root === null){
            $root = $node;
            return true;
        }
       
       if(ord((string) $data) < ord((string)$root->data) ){
         if($root->left === null){
            $root->left = $node;
            return true;
         }else{
            $this->_insert($root->left,$data);
         }
       }else{
        if($root->right === null){
            $root->right = $node;
            return true;
         }else{
            $this->_insert($root->right,$data);
         }
       }
    }

    function levelOrderInsert($data){
        $this->_levelOrderInsert($this->root,$data);
    }

    private function _levelOrderInsert(&$root,$data){
        $node  = new Node($data);
        if($root === null){
           $root  = $node;
           return;
        }

        $queue  = [$root];
       
        while (!empty($queue)){
            $cur  = array_shift($queue);
            if($cur->left === null){
                $cur->left = $node;
                 break;
            }
          
           else if($cur->right === null){
                $cur->right = $node;
                break;
            }

            if($cur->left !== null)  array_push($queue,$cur->left);
            if($cur->right !== null) array_push($queue,$cur->right);
            

        }

    }

    function transverse($type,$root=null){
        $_root  = $root ===null?$this->root:$root;
        return $this->_transverse($_root,$type);
    }
    private function _transverse(&$root,$type='pre'){
        static $res = [];
         if($root === null){
            return $res;
         }
         if($type === 'pre') array_push($res,$root->data);
         $this->_transverse($root->left,$type);
         if($type === 'in')array_push($res,$root->data);
         $this->_transverse($root->right,$type);
         if($type === 'post') array_push($res,$root->data);
       return $res;
    }

     function levelOrder(){
        return $this->_levelOrder($this->root);
     }

    private function _levelOrder(&$root){
       
        $res  = [];
        if($root === null){
            return [];
        }
         $queque  = [$root];
          $leftToRight =false;
        while (!empty($queque)){
              $cur  = array_shift($queque);
               array_push($res,$cur->data);
               if($leftToRight){
                 if($cur->left !== null) array_push($queque,$cur->left);
                 if($cur->right !== null) array_push($queque,$cur->right);
               }else{
                if($cur->right !== null) array_push($queque,$cur->right);
                if($cur->left !== null) array_push($queque,$cur->left);
               }
           
          
          // $leftToRight  = !$leftToRight;
        }////////end first while
        return $res;
    }

    function zigzag($root){
   
   
    if($root != null){ 
        $res  = []; 
        $curLevel  =[];
        array_push($curLevel,$root);
        $leftToRight = true;
        while(sizeof($curLevel) > 0 ){
             $eachLevel  = [];
             $nextLevel  = [];
             ////////////////////////////////////
             while(sizeof($curLevel) > 0 ){
                $cur  = array_pop($curLevel);
                array_push($eachLevel,$cur->data);
                if($leftToRight){
                    if($cur->left !== null) array_push($nextLevel,$cur->left);
                    if($cur->right !== null) array_push($nextLevel,$cur->right);
                  }else{
                   if($cur->right !== null) array_push($nextLevel,$cur->right);
                   if($cur->left !== null) array_push($nextLevel,$cur->left);
                  }
             }
          //////////////////////////// basic is  $curLevel  =  $nextLevel; pop from currrentLevel push into nextLevel
          $curLevel  =  $nextLevel;
          array_push($res,$eachLevel);
          $leftToRight = !$leftToRight;
        } 
   
    }

    return $res;
}


}

$t = new BinaryTree();
$t->insert(1);
$t->insert(2);
$t->insert(3);
$t->insert(4);
$t->insert(5);
$t->insert(6);
$t->insert(7);
//print_r($t->root);

$t2 = new BinaryTree();
$t2->insert('g');
$t2->insert('f');
$t2->insert('h');
$t2->insert('b');
$t2->insert('j');

//print_r($t2->root);

//print_r($t->transverse('post'));
//print_r($t->levelOrder());
//echo $t2->root->data."\n";

// echo $t2->root->left->data."\n";
// echo $t2->root->right->data."\n";

// echo $t2->root->left->left->data."\n";
// //echo $t2->root->left->right->data."\n";

$t3 = new BinaryTree();
$t3->levelOrderInsert(1);
$t3->levelOrderInsert(2);
$t3->levelOrderInsert(3);
$t3->levelOrderInsert(4);
$t3->levelOrderInsert(5);
$t3->levelOrderInsert(6);
$t3->levelOrderInsert(7);


print_r($t3->levelOrder());

//print_r($t3->transverse("in"));


print_r($t3->root->data)."\n";
print_r($t3->root->left->left->data)."\n";

/// pre-order == root => left subtree => right subtree (root first)
/// pre-order == left subtree => root =>  right subtree (root second )
/// pre-order == left subtree  =>  right subtree=> root  (root third)



print_r($t3->zigzag($t3->root));