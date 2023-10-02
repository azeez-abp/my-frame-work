<?php
declare(strict_types=1);
namespace App\Controller\Admin;

class Register{
     
      function __construct(){
          ////////////////////////function to call widdle ware
          $middleWares  = func_get_args();

          if(sizeof($middleWares) >0){
               //print_r($middleWares);
               foreach ($middleWares as  $middleWare ) {
                      if(is_callable($middleWare)){
                         $middleWare();
                      }
               }
          }
    
  
        
      }

     public function getRegister($a,$b):int{
     	 echo  json_encode(['bame'=>"fdsdf"]);
          return 1;
     }


}


