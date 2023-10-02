<?php
///
function isSave($arr, $row, $col)
{

    for ($i = 0; $i < $row; $i++) {
        if ($arr[$row][$col] === 'Q') { //check row befor the current one
            return false;
        }
        ///checking diagonal row- col+ right diagonal
        for ( //two senerio for each
            $r =  $row - 1, $c = $col + 1;
            $r >= 0 && $c < sizeof($arr[0]);
            $r--, $c++
        ) {
            if ($arr[$r][$c] === 'Q') { //check row befor the current one
                return false;
            } # code...
        }

        ///checking diagonal row- col- left diagonal
        for ( //two senerio for each
            $r =  $row - 1, $c = $col - 1;
            $r >= 0 && $c >= 0;
            $r--, $c--
        ) {
            if ($arr[$r][$c] === 'Q') { //check row befor the current one
                return false;
            } # code...
        }
    }
    return true;
}
function NQueen($arr, $row)
{
    /**
     * No two queen occupy the location on their separate arrat
     *  [0 ,0 0 1]
     *  [0,0 0, 1 ] 
     * this above is wrong as the first and second queen (1) occupy position 3 on their array
     * N by N board conatains N queen e,g 4 By 4 board contain 4 queen
     * Each row contain only one queen
     * basic is the parmuation algo
     *   
     *    
     *   +---+--+ direction to check: left and right diagonal
     *   |      |
     *   --------
       
     */
    if ($row === sizeof($arr)) {
        print_r($arr);
        echo "---------------------------";
        return;
    }


    for ($col = 0; $col < sizeof($arr[0]); $col++) {

        if (isSave($arr, $row, $col) == true) {
            $arr[$row][$col] = 'Q';
            NQueen($arr, $row + 1);
            $arr[$row][$col] = '.';
        }
    }
}

NQueen([['.', '.', '.'], ['.', '.', '.'], ['.', '.', '.']], 0);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
The N Queens problem is a classic problem of placing N chess queens on an NxN chessboard such that no two queens threaten each other. The problem can be solved using backtracking.

Here's how you can implement the N Queens problem using recursion and backtracking in PHP:
*/
function solveNQueens($n)
{
    // Create an empty board
    $board = array_fill(0, $n, array_fill(0, $n, 0));
    
    // Start from the first row
    solveNQueensUtil($board, 0, $n);
}

function solveNQueensUtil(&$board, $col, $n)
{
    // If all queens are placed, print the board
    if ($col == $n) {
        printBoard($board, $n);
        return true;
    }
    
    $res = false;
    // Try placing a queen in each row of the current column
    for ($i = 0; $i < $n; $i++) {
        if (isSafe($board, $i, $col, $n)) {
            // Place the queen on this position
            $board[$i][$col] = 1;
            // Recur to place the rest of the queens
            $res = solveNQueensUtil($board, $col+1, $n) || $res;
            // If the rest of the queens cannot be placed, backtrack
            $board[$i][$col] = 0;
        }
    }
    // If no queen can be placed in this column, return false
    return $res;
}

function isSafe($board, $row, $col, $n)
{
    // Check if there is a queen in the same row
    for ($i = 0; $i < $col; $i++) {
        if ($board[$row][$i] == 1) {
            return false;
        }
    }
    
    // Check if there is a queen in the upper diagonal
    for ($i = $row, $j = $col; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($board[$i][$j] == 1) {
            return false;
        }
    }
    
    // Check if there is a queen in the lower diagonal
    for ($i = $row, $j = $col; $j >= 0 && $i < $n; $i++, $j--) {
        if ($board[$i][$j] == 1) {
            return false;
        }
    }
    
    return true;
}

function printBoard($board, $n)
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            echo $board[$i][$j]." ";
        }
        echo "<br>";
    }
    echo "<br>";
}

// Example usage:
$n = 4;
solveNQueens($n);
