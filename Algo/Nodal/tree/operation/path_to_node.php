<?php



class BinaryNode
{
    public function __construct($data)
    {
        $this->left  = null;
        $this->data  = $data;
        $this->right  = null;
    }
}
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
$root  = new BinaryNode(3);
$root->left  =  new BinaryNode(4);
$root->right  = new BinaryNode(5);
$root->left->left  =  new BinaryNode(6);
$root->left->right  =  new BinaryNode(7);
$root->right->left  =  new BinaryNode(8);
$root->right->right  =  new BinaryNode(9);
$root->left->left->left  =  new BinaryNode(10);
$root->left->left->right  =  new BinaryNode(11);

function pathToNode($root){
   static $path = [];
   static $paths = [];

   if($root === null){
   	return [];
   }
   
   array_push($path,$root->data);
   array_push($paths,$path);
   pathToNode($root->left);
   pathToNode($root->right);

   return $paths;
}

print_r( pathToNode($root));
// Empty Job for ABP Chat APP with Build Script included in Package.json
// - task: PublishBuildArtifacts@1
//   displayName: 'Publish Artifact: drop-build'
//   inputs:
//     ArtifactName: 'drop-build'
//  Empty Job for ABP Chat App with Build Script Add