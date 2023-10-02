<?php

    class Node
    {

        public  function __construct($data)
        {
            $this->left = null;
            $this->data  = $data;
            $this->right =  null;
        }
    }

     function BSTFromSortedtedArray($arr, $start, $end)
    {
        if ($start > $end) {
            return null; //not  a sorted array
        }
        $node  = new Node(null);
        if ($start === $end) { //only one element
            $node->data  = $arr[$start];
            $node->left  = null;
            $node->right = null;
        } else {

            /*
              first call left=> start is 0 ; end is (mid-1) is 2 for left // mid is 1 and and end is 2  and mid element is at pos 1 i.e 2

               first call right=> start(mid+1) is pos 3 ; end is  is pos 6 mid  is 5 element 6
                generally left come down using mid valeu and the right go up using mid value
             */
            $mid  = floor($start + ($end - $start) / 2); //  ==> ($start+ $end)/2 
            echo $mid . "\n";
            $node->data  = $arr[$mid];
            $node->left  = BSTFromSortedtedArray($arr, $start, $mid - 1); //going downward
            $node->right  = BSTFromSortedtedArray($arr, $mid + 1, $end); // going upward
        }
        return $node;
    }

    $a  = [2, 3, 4, 5, 6, 7];
    print_r(BSTFromSortedtedArray($a, 0, count($a)));

        function printRangeInBST($root, $start, $end)
    {
        if ($root === null) {
            return [];
        }
        static $range  = [];
        if ($start <= $root->data && $root->data <= $end) {
            array_push($range, $root->data);
        }
        //if ($root->data > $end) printRangeInBST($root->left, $start, $end);
        //if ($root->data < $start) printRangeInBST($root->right, $start, $end);
        printRangeInBST($root->left, $start, $end);
        printRangeInBST($root->right, $start, $end);

        return $range;
    }

    print_r(printRangeInBST(BSTFromSortedtedArray($a, 0, count($a) - 1), 4, 7));