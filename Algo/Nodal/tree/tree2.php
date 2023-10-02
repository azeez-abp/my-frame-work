<?php
class BinaryTree
{
    public function __construct($data)
    {
        $this->left  = null;
        $this->data  = $data;
        $this->rigth = null;
    }

    public function setData($data)
    {
        $this->data  = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function getRight()
    {
        return $this->rigth;
    }

    public function insertLeft($node)
    {
        if ($this->left === null) {
            $this->left  = $node;
        } else {
            ///exchange the node
            $temp  = $node;
            $temp->left  = $this->left;
            $this->left  = $temp;
        }
    }

    public function insertRight($node)
    {
        var_dump($this->data);
        if ($this->rigth === null) {
            $this->rigth  = $node;
        } else {
            ///exchange the node
            $temp  = $node;
            $temp->rigth  = $this->rigth;
            $this->rigth  = $temp;
        }
    }

    public function insertWithLevelOrder($root, $data)
    {   ////breath first first
        $newNode  = new BinaryTree($data);

        static $result  = [];
        if ($root === null) {
            $root   =  $newNode;
            return $root;
        }
        $queue  = [];
        array_push($queue, $root);
        $node  = null;
        $targetNode = null;
        while (!empty($queue)) {
            ///use to sort insert and find node
            $node  = array_shift($queue); ///breadth first horizontal first FIFO i.e queue bq
            //$node  = array_pop($queue);  ////dept first verticalfirst LIFO i.e stack ds
            array_push($result, $node->data);
            if ($node->data == $data) {
                //do nothing
                return $root;
            }

            if ($node->left !== null) {
                array_push($queue, $node->left);
                ////the left
                /// with stack the block of code above read last
            } else {
                /////insert if left is null
                $node->left   = $newNode;
                return $root;
            }

            if ($node->right !== null) {
                ///the right
                array_push($queue, $node->right);
            } else {
                /////insert if right is null
                $node->right  = $newNode;
                return $root;
            }
        }

        //Time Complexity: O(n). Space Complexity: O(n). 
    }

    public function findSizeOfTRee($root)
    {
        if ($root === null) {
            return 0;
        } else {
            return  $this->findSizeOfTRee($root->left) + $this->findSizeOfTRee($root->rigth) + 1;
        }
    }

    public function deleteTree($root)
    {
        if ($root === null) {
            return true;
        } else {
            $this->deleteTree($root->left);
            $this->deleteTree($root->right);
            $root  = null;
        }
    }
    public function findVertically2($root)
    {
        static $result  = [];
        if ($root === null) {
            return $result;
        }
        array_push($result, $root->getData());

        $this->findVertically($root->getRight()); ////it continue to the right untill rigth is null ans the go to the next line of code
        $this->findVertically($root->getLeft()); ////it continue to the letf untill the next right is met, then right continue until right is null
        return $result;
    }

    public function findVertically($root)
    {
        static $result  = [];
        if ($root === null) {
            return $result;
        }
        array_push($result, $root->getData());
        $this->findVertically($root->getLeft()); ////it continue to the left untill the left is null
        $this->findVertically($root->getRight()); ////it continue to the right untill the next left

        return $result;
    }
    public function maxDept($root)
    {
        if ($root === null) {
            return 0;
        } else {
            return max($this->maxDept($root->left), $this->maxDept($root->rigth)) + 1;
        }
    }

    public function maxDeptIterative($root)
    {
        if ($root === null) {
            return 0;
        } else {
            $q    = [];
            array_push($q, [$root, 1]);
            $temp  = 0;
            $res   = [];
            while (!empty($q)) {

                list($node, $dep) = array_pop($q);
                $dept  = max($temp, $dep);
                if ($node !== null && $node->left !== null) {
                    array_push($res, $node->left->getData());
                    array_push($q, [$node->left,  $dept + 1]);
                }

                if ($node !== null && $node->rigth !== null) {
                    array_push($res, $node->rigth->getData());
                    array_push($q, [$node->rigth,  $dept + 1]);
                }

                $temp  = $dept;
            }

            return [$temp - 1, $res];
        }
        ///Time Complexity: O(ri). Space Complexity: O(n). 
    }

    public function deepestNode($root)
    {
        if ($root === null) {
            return 0;
        } else {
            $q  =  [$root];
            $node  = null;

            while (!empty($q)) {

                $node = array_shift($q); //FIFO ///FIFO=>shit ///LIFO=>pop] SFIFO  PLIFO
                if ($node->left !== null) {
                    array_push($q, $node->left);
                }

                if ($node->rigth !== null) {
                    array_push($q, $node->rigth);
                }
            }
            return $node->getData();
        }
    }

    public function treeMirriorImage($root)
    {
        if ($root !== null) {
            $this->treeMirriorImage($root->left);
            $this->treeMirriorImage($root->rigth);
            //#swap
            $temp  = $root->left;
            $root->left  = $root->rigth;
            $root->rigth  = $temp;
        }
    }

    public function checkTwoTreeIsMirrorImage($root1, $root2)
    {
        if ($root1 === null && $root2 === null) {
            return true;
        }
        if ($root1 === null && $root2 === null) {
            return 0;
        }
        if ($root1->getData() !== $root2->getData()) {
            return 0;
        } else {
            return  $this->checkTwoTreeIsMirrorImage($root1->left, $root2->right) &&
                $this->checkTwoTreeIsMirrorImage($root1->right, $root2->left);
        }
    }

    public function transverse($rootOfTree)
    {
        $root = null;
        $q  = [$rootOfTree];
        $res  = [];
        while (!empty($q)) {
            //$root  =  array_pop($q); //stack rigth to left 
            $root  =  array_shift($q); //queue  left to right
            array_push($res, $root->data);

            if ($root->left !== null) {
                array_push($q, $root->left);
            }

            if ($root->getRight() !== null) {
                array_push($q, $root->getRight());
            }
        }
        return $res;
    }

    public function zigzagTransverse($root)
    {
        ////sibling at each level
        $result = [];
        $currentLevel = [];
        if ($root !== null) {
            array_push($currentLevel, $root);
        }

        $leftToright = true;
        while (count($currentLevel) > 0) {
            $levelresult = [];
            $nextLevel =   [];

            while (count($currentLevel) > 0) {
                $node = array_pop($currentLevel);
                array_push($result, $node->data);
                if ($leftToright) {
                    if ($node->left !== null) {
                        array_push($nextLevel, $node->left);
                    }
                    if ($node->right !== null) {
                        array_push($nextLevel, $node->right);
                    }
                } else {

                    if ($node->right !== null) {
                        array_push($nextLevel, $node->right);
                    }

                    if ($node->left !== null) {
                        array_push($nextLevel, $node->left);
                    }
                }
            }
            $currentLevel  = $nextLevel;
            array_push($result, $levelresult);
            $leftToright = !$leftToright;
        }
        return $result;
    }

    function isBST($root)
{

    if ($root === null) {
        return 1;
    }

    if ($root->left !== null && $root->left->data > $root->data) {
        return 0;
    }

    if ($root->right !== null && $root->right->data  < $root->data) {
        return 0;
    }

    if (!$this->IsBST($root->left) || ! $this->IsBST($root->left)) {
        return 0;
    }
    return true;
}

}




$root =   new BinaryTree(1);
$node1  = new BinaryTree(2);
$node2  = new BinaryTree(3);
$node3  = new BinaryTree(4);
$node4  = new BinaryTree(5);
$node5  = new BinaryTree(6);
$node6  = new BinaryTree(7);
$node7  = new BinaryTree(8);
$node8  = new BinaryTree(9);

$root->insertLeft($node1);
$root->insertRight($node2);
/////////////////////
$node1->insertLeft($node3);
$node1->insertRight($node4);
/////////////////////////////////
$node2->insertLeft($node5);
$node2->insertRight($node6);
////////////////////////////
$node3->insertLeft($node7);
$node3->insertRight($node8);
////////////////////////////
print_r($root->maxDeptIterative($root));

$root->treeMirriorImage($root);

print_r($root->maxDeptIterative($root));
print_r($root->transverse($root));
/*

            1
            /\
           2  3
          /\  /\
         4  5 6 7
        /\  
       8  9   

 */
//print_r($root);


// function wordSearch($grid, $str)
// {
//     $res  = '';
//     for ($i = 0; $i < count($grid); $i++) {
//         for ($j = 0; $j < count($grid[$i]); $j++) {
//             echo $grid[$i][$j] . "\n";
//             if (strpos($str, $grid[$i][$j])) {

//                 $res .= $grid[$i][$j];
//             }
//         }
//     }
//     return $res;
// }
// echo wordSearch([
//     ['l', 'n', 'o'], ['p', 'q', 'r'], ['s', 't', 'u', 'v'],
//     ['a', 'b', 'c', 'd', 'e']
// ], 'love');
