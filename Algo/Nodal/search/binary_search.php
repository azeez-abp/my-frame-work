<?php
function binary_search_memo($list, $search, $index_start, $index_end)
{
    //demonstrate pointer shifting
    ///this is achieve by moving start pointer to next position in the array
    static $catch  = [];
    $index_middle  = floor((($index_end - 1) + $index_start) / 2);

    ///what we are looking fir in the list is in middle
    // we return the middle index 
    if ($index_start >= $index_end) {
        return -1;
    }

    if ($list[$index_middle] == $search) {
        return $index_middle;
    }

    if ($search < $list[$index_middle]) {
        return binary_search_memo($list, $search, $index_start, $index_middle);
        ///what we are loooking for is less, so we looking behind
    }

    if ($search > $list[$index_middle]) {
        ///what we are loooking for is less, so we looking ahead
        return binary_search_memo($list, $search, $index_middle + 1, $index_end);
    }
}

$list  = [1, 2, 3, 4, 5, 6, 67];
$end  = count($list);
$start = 0;
echo $list[binary_search_memo($list, 4, $start, $end)];