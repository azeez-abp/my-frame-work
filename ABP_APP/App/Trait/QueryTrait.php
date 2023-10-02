<?php

namespace App\Trait;

trait QueryTrait
{
  private string $_helper;

  public function joinWhere()
  {
    //echo "Where JOIN";
  }

  public function where(string|object $field, string|null $operator = null, string|null $val = null): self
  {
    if (is_callable($field)) {

      $this->nest($field);
    } else {



      $this->_sql  .= preg_match("/where/i", $this->_sql) ? (" AND  `$field` $operator?  ") : (" WHERE  `$field` $operator? ");

      $this->_sql_raw  .= preg_match("/where/i", $this->_sql_raw) ? (" AND `$field` $operator $val  ") : (" WHERE  `$field` $operator $val ");


      array_push($this->values, $val);
    }

    return $this;
  }


  public function orWhere($field, $operator, $val): self
  {

    $this->_sql  .= preg_match("/where/i", $this->_sql) ? (" OR  `$field` $operator?  ") : (" WHERE  `$field` $operator?  ");

    $this->_sql_raw  .= preg_match("/where/i", $this->_sql_raw) ? (" OR  `$field` $operator '$val'  ") : (" WHERE  `$field` $operator '$val'  ");


    array_push($this->values, $val);
    return $this;
  }



  public function nest($callback): self
  {


    $this->_sql  .= preg_match("/where/i", $this->_sql) ? " AND (" : " (";
    $this->_sql  .= $callback($this);
    $this->_sql  .= ")";

    $this->_sql  = str_replace('( AND', '(', $this->_sql);
    $this->_sql  = str_replace('( OR', '(', $this->_sql);
    //////////////////////////////////////////////////////do the same for raw sql


    $this->_sql_raw  .= preg_match("/where/i", $this->_sql_raw) ? " AND (" : " (";
    $this->_sql_raw  .= $callback($this);
    $this->_sql_raw  .= ")";

    $this->_sql_raw  = str_replace('( AND', '(', $this->_sql_raw);
    $this->_sql_raw  = str_replace('( OR', '(', $this->_sql_raw);


    return $this;
  }


  public static function indexTable($name, $table_name, $table_column): string
  {

    $sql  = "CREATE INDEX {$name} ON {$table_name} ($table_column)";

    return $sql;
  }
}
