<?php

function lowestCommonAncestor($root, $p, $q)
{
    if ($root === null || $root->data === $p || $root->data === $q) {
        ////if the node is null stop and give me the node
        /// is the node is p or q stop and give me the ndoe
        return $root;
    }

    ////once I have the node go to left ntill no more left and the go to the right
    $l  = lowestCommonAncestor($root->left, $p, $q);
    $r  =  lowestCommonAncestor($root->right, $p, $q);

    if ($root->left === null) {
        return  $r;
    } else if ($root->right === null) {
        return   $l;
    } else {
        return $root;
    }
}

print_r(lowestCommonAncestor($root, 6, 7)->data);