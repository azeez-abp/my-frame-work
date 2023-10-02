  <?php

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

        if (!isBST($root->left) || !isBST($root->left)) {
            return 0;
        }
        return true;
    }
    //XOpImz7zmRhu9W8LHzQqzk+TCCAXWZ+HIoTo96yQDgI=