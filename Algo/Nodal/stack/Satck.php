<?php

class Stack
{



    public function __construct(private int $len  = 10)
    {
        $this->len  = $len;
        $this->stk  = [];
    }

    public function isEmpty()
    {
        return count($this->stk) === 0;
    }

    public function push($item)
    {
        if ($this->len < 1) {
            echo  "Stack overflow";
            return 0;
        }
        array_push($this->stk, $item);
        // $this->stk[$this->len - 1]  = $item;
        $this->len -= 1;
    }

    public function pop()
    {
        if (count($this->stk) <= 0) {
            echo "Stack undeflow";
            return false;
        } else {
            array_pop($this->stk); //remove last element
            $this->len -= 1;
        }
    }

    public function peek()
    {
        if (count($this->stk) <= 0) {
            echo "Stack undeflow";
            return false;
        } else {
            $re =  $this->stk[$this->len - 1]; ///first element that go in filo
            //  $this->len -= 1;
            return $re;
        }
    }
}
//https://www.youtube.com/watch?v=BrVZZZkkGGI&list=PLVlQHNRLflP_OxF1QJoGBwH_TnZszHR_j&index=2