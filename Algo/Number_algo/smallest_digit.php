<?php

function smallestDigit($number) {
  $smallest = 9;
  while ($number > 0) {
    $digit = $number % 10;
    $smallest = min($digit, $smallest);
    $number = (int)($number / 10);
  }
  return $smallest;
}


/*This implementation uses a while loop to continuously divide the number by 10, which extracts the rightmost digit of the number each time. The extracted digit is then compared with the current smallest digit, and if it is smaller, it becomes the new smallest digit. This process continues until the number is reduced to zero.

This optimized implementation has a time complexity of O(log n), where n is the number of digits in the input number. This is more efficient than an implementation that converts the number to a string and iterates through the characters, which would have a time complexity of O(n).*/