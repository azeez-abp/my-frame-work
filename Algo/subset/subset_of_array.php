<?php

// function dfs($index, $nums, &$subset, &$res)
// {
//     $subset;
//     if ($index >= count($nums)) { //loo p finish
//         return  array_push($res, $subset);
//     }

//     array_push($subset, $nums[$index]);
//     dfs($index + 1, $nums, $subset, $res);
//     array_pop($subset);
//     dfs($index + 1, $nums, $subset, $res);
//     return $res;
// }


// function subset(array $nums)
// {
//     $res  = [];
//     $subset  = [];

//     return dfs(0, $nums, $subset, $res);
// }

// print_r(subset([1, 2, 3]));



function generateSubset($index, $nums, &$subset, &$res)
{
    $subset;
    if ($index >= count($nums)) { //loo p finish
        return  array_push($res, $subset);
    }

    array_push($subset, $nums[$index]);
    generateSubset($index + 1, $nums, $subset, $res);
    array_pop($subset); ////empty subset container
    generateSubset($index + 1, $nums, $subset, $res);
    return $res;
}
$subset  = [];
$res = [];
generateSubset(0, [1, 2, 3], $subset, $res);


function subSet($array)
{

    $bit;
    $max_bits;  // max bits for number i
    $size  = count($array);
    $end  = pow(2, $size); //subset   = 2*n

    $res = [];
    for ($i = 0; $i < $end; $i++) { //
        printf("{ ");
        $each_set  = [];
        $max_bits = floor(log($i, 2)); // the number of times 2 will divide $i    //is the number of the times the next loop will read
        //echo $max_bits . " bit\n";
        for ($j = 0; $j <= $max_bits; $j++) {
            $bit = ($i >> $j) & 1;  // bit value at position j /// divide $i by 2 in $j times 
            if ($bit == 1) {
                $each_set = [...$each_set, $array[$j]];
                printf("%s ", $array[$j]);  // one-based array, add 1
            }
        }
        $res  = [...$res, $each_set];
        printf("}\n");
    }
    print_r($res);
    echo  $end;
    return 0;
}

subSet([1, 2, 3, 4, 5]);


function subset2($array, $subset = [], $index = 0)
{
    $result = [];

    if ($index == count($array)) {
        $result[] = $subset; // Add the current subset to the result
        return $result;
    }

    // Exclude the current element and generate subsets
    $result = array_merge(
        $result,
        subset2($array, $subset, $index + 1)
    );

    // Include the current element and generate subsets
    $result = array_merge(
        $result,
        subset2($array, array_merge($subset, [$array[$index]]), $index + 1)
    );

    return $result;
}



echo "======================================";
print_r(subset2([1, 2, 3]));
echo "======================================";
