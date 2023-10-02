/**
 * @param {number[]} nums
 * @param {number} target
 * @return {boolean}
 * @explain application of two pointer
 */
var checkForTarget = function(nums, target) {
    let left = 0;
    let right = nums.length - 1;
    
    while (left < right) {
        let curr = nums[left] + nums[right];
        if (curr == target) {
            return true;
        }
        /////point of sliding 
        if (curr > target) {
            right--;  ///slide to right
        } else {
            left++; ///slide to the left
        }
    }
    console.log(nums[left],nums[right])
    
    return false;
}

checkForTarget([1,2,3,4,5,6,7,8,9],12)

/////////////////////////////////////////////////////////////////////


function reverseString(str) {

    // empty string
    let newString = "";
    for (let i = str.length - 1; i >= 0; i--) {
        newString += str[i];
    }
    return newString;
}
console.log(reverseString("Azeez"),new Date().toLocaleTimeString())
