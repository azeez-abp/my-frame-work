<?php 
namespace App\Dependency;
use App\Template\DbTemplate;
class DB extends DbTemplate{
  use \App\Trait\QueryTrait;
   private static $_instance=null;
   private $_pdo=null,
           $_query=null,
           $_conn = null,
           $_error=false,
           $_results=null,
           $_count ;


        private   $_sql;

        private   $_table;
           

    private function __construct($table){
//var_dump($this,get_class_methods($this));
             $this->_table = $table;
             $this->_sql = '';
             $this->_sql_raw = '';
             $this->values  = [];
             $this->bracket_sql  = false;

         try {
                  
          $this->_pdo = new \PDO('mysql:host=localhost;dbname=abp_tut_2009_021', 'root', '');
                
            }catch (PDOException $e) {

             die($e->getMessage()); 
         }
    }
 protected  function testDataType(int $val):int{
        return 0;
 } 
public static function table(string $table): object {
       // var_dump(self::class);
     if (!isset(self::$_instance)){
            
            self::$_instance = new DB($table);
          }
         return self::$_instance;

   }

public  function select(string ...$params): object {
 
   $sql  = '';
   foreach ($params as $param) {
    $match  = preg_match("/\w.+(?=AS\W)/i", $param, $result);
      $sql   .= $match?str_replace($result[0],'`'.trim($result[0]).'` ', $param).' ,' : "`{$param}` ,";
   }
//echo $sql;
$sql  = rtrim($sql," ,");

   $this->_sql  .= "select {$sql}  from {$this->_table} ";
   $this->_sql_raw  .= "select {$sql}  from {$this->_table} ";
 
  return $this;

 
 }  
   

public function where_(string $field, string $operator, mixed $value): self {

    //  $this->_sql  .= preg_match("/where/i",$this->_sql)? ( "AND WHERE `${field}` ".($val? ($operator." '$val'"): ("= '$operator'") )." "  ): 
    // ("WHERE `{$field}` ".($val? ($operator." '$val'"): ("= '$operator'") )." ");



return $this;
}
private function data($data_num=-1){

$data  =   $this->query( $this->_sql ,$data_num,$this->values);
  
return $data;
}

public function get($data_num=-1){

return $this->data($data_num)->_results;
}

public function count($data_num=-1){

return $this->data($data_num)->_count;
}


public function toSql($isPdo = true){
  $rSql    = $isPdo? $this->data()->_sql:$this->_sql_raw; 
  return $rSql;
}


public function query($sql,$rowNumber,$params =  null){
 
    $this->_error = false; 
    
//   print_r($params);
           
    if ($this->_query = $this->_pdo->prepare($sql)){
          
          if( !empty($params) && count($params)){
         //  print_r($params);
             foreach ($params as $key=> $param) {
              $this->_query->bindValue(($key+1), $param);
             }

          }
   //echo $sql;

           try {

             $this->_pdo->beginTransaction();
        if ($this->_query->execute()) {
                       //echo $this ->_query;
         
                 $this ->_results = $rowNumber ==1?$this ->_query->fetch(\PDO::FETCH_OBJ) : $this ->_query->fetchAll(\PDO::FETCH_OBJ);
                 $this->_count = $this ->_query->rowCount(); 
        
               $this->_pdo->commit();
          } else {

            $this->_error = true;

          }
    } catch (\PDOException $e) {
         if( $this->_pdo->inTransaction()){
               $this->_pdo->rollback();
         }
      var_dump("Error is due to", $e);
    }

               


        

     }
 return $this;




    }  

public function done($sql) : bool
{
  
   $this->_error = false; 
    


    if ($this->_query != $this->_pdo->prepare($sql)){
          
           return  false;
     }
  
   try {
        if ($this->_query->execute()) {
                  
           return true;

          } else {

            return false;

          }
    } catch (\PDOException $e) {
      var_dump("Error is due to", $e);
    }

}


}