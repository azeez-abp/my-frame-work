<?php
/*
Why Circular Arrays for queue implementation?
 initial slots of the array arc getting wasted
 To solve this problem we assume the arrays as circular
arruys. That means, we treat the last element and the first array elements as contiguous

With this representction, if there are any free slots at the beginning, the rear pointer can easily go to its next free slot.

In the array, we add elements circularly and use two
variables to keep track of the start element and end element

lnitially, both front and rear point to -1 which indicate that the queue is empty.




 def enQueue(self, item):
        if self.size >= self .limit:
            print('Queue Overflow!')
            return
        else:
            self.que.append(item)
        if self.front is None:
            self.front = self.rear = 0
        else:
            self.rear = self.size
        self.size += 1
        print('Queue after enQueue', self.que)
*/

use function Psy\bin;

class Queue
{

    public function __construct(int $limit  = 5)
    {
        $this->que   = [];
        $this->limit = $limit;
        $this->front = null;
        $this->rear  = null;
        $this->size  = 0;
    }

    public function isEmpty()
    {
        return $this->size < 0;
    }

    public function enQueue($item)
    {
        if ($this->size >= $this->limit) {
            return "Queue overflow";
        } else {
            $this->que[$this->size]  = $item;
        }

        if ($this->front === null) {
            $this->front = $this->rear  = 0;
        } else {
            $this->rear  = $this->size;
        }
        $this->size++;
        var_dump($this->que);
    }

    public function deQueue()
    {
        if ($this->size < 0) {
            return "Queue underflow";
        } else {
            array_pop($this->que);
            $this->size -= 1;

            if ($this->size === 0) {
                $this->front  = $this->rear = null;
            } else {
                $this->rear  = $this->size - 1;
            }
        }
    }

    public function queueRear()
    {    //get last item
        if ($this->rear === null) {
            return "Queue is empty";
        } else {
            return  $this->que[$this->rear];
        }
    }

    public function queueFront()
    {
        // get front item
        if ($this->front === null) {
            return "Queue is empty";
        } else {
            return  $this->que[$this->front];
        }
    }

    public function size()
    {
        return $this->size;
    }
}
$q    = new Queue();
$q->enQueue("data1");
$q->enQueue("data2 knln ");
$q->enQueue("delia");
echo $q->queueFront() . "\n"; //get the first item 
echo $q->queueRear();  //  get last item
// $a  = [1, 2, 3, 4, 5];
// print_r(array_pop($a)); //remove last
// print_r($a);
// print_r(array_shift($a)); //remove begining
// print_r($a);

//echo 2 << 1;
//echo "\n";
//consvert 2 to bin 10 
//<< 1 add 1 zero to it front 100
// convert the answer to base 10
//echo bindec(100);
// $a  = explode(' ', 'df78 622a df78 622a 0000 0001 0000 0000');
// foreach ($a as $w) {
//     echo chr(hexdec($w)) . "\n";
// }
//echo  chr(hexdec('df78 622a df78 622a 0000 0001 0000 0000'));
//ord() get ASCII value(decimal value) of a character
//echo (decbin(ord('d') >> 4));
