<?php 
declare(strict_types=1);
namespace App\ServicesContainer;
////How to load services into container;
class ServicesContainer implements ContainerInterface{
  
     private $entry  = [];

	 public function get(string $id)
	 {

         if($this->has($id)){
         	////bing is mapping key to value in a array 
         	  $serviceToGet   = $this->entry[$id];
             return $serviceToGet($this);
         	 //throw new \Exception("Subject service class is not in entry");
         }

      return $this->resolve($id); //do the auto-wiring
	 }


	 public function has(string $id): bool
	   {

           return $this->entry[$id];
	   }

	 public function addService(int $id ,callable $service)
	   {
           $this->entry[$id]  = $service;

           ////entry id an array that map class path to function that accept $this as parameter
           /// to as other service as augument to the constructor of other classes
           /// this make it possible to set and get service at the same tion 
	   }
 

     public function resolve($id){
     	//inspect the class structure
     	// check may be it has constuctor with class parameter i.e. dependency
     	// if true, resolve the class using conatiner using Reflection class inbuilt

     	 $reflectinClass  = new \Reflection($id);

     	 if(!$reflectinClass->isInstantiable()){
     	 	//ew can not create object from it
     	   throw new Exception("That param is not a class")
     	 }

     	  $constructor  = $reflectinClass->getConstructor()
         
         if(! $constructor ){
         	return new $id;
         }

         $parametres  = $constructor->getParameters();

         if(!parametres){
         	return new $id;
         }

         $dependecies  = array_map(function(\ReflectionParameter $params)use($id){
                          $name  = $params->getName();
                          $type  = $params->getType();

                          if(!$type){
                          	throw new Exception($id." has no type_hint");
                          }

                          if($type instanceof \ReflectionUnionType ){
                           	throw new Exception($id." is instance of reflection union");
                           }


                           if($type instanceof \ReflectionNameType && !$type->isBuiltIn()  ){
                           	 rerturn $this->get($this->getName);
                           }


                           


         },$parametres);  

         return $reflectinClass->newInstanceArgs($dependecies);
                                                                                                                                                                                                                                                                                                                                                                                                                                                         
     }


}