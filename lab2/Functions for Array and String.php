<?php
// Array Functions

// 1. array_push: Add an element to the end of the array
$array = [1, 2, 3];
array_push($array, 4);
echo "After using array_push: ";
print_r($array); // [1, 2, 3, 4]
echo '<br/>';

// 2. array_pop: Remove the last element from the array
$lastElement = array_pop($array);
echo "Removed element: $lastElement<br/>"; // 4
print_r($array); // [1, 2, 3]
echo '<br/>';

// 3. array_merge: Merge two arrays
$array1 = [1, 2];
$array2 = [3, 4];
$mergedArray = array_merge($array1, $array2);
echo "After using array_merge: ";
print_r($mergedArray); // [1, 2, 3, 4]
echo '<br/>';

// 4. array_slice: Extract a portion of the array
$slicedArray = array_slice($mergedArray, 1, 2);
echo "After using array_slice: ";
print_r($slicedArray); // [2, 3]
echo '<br/>';

// 5. array_keys: Get the keys of the array
$assocArray = ["a" => 1, "b" => 2, "c" => 3];
$keys = array_keys($assocArray);
echo "Array keys: ";
print_r($keys); // ["a", "b", "c"]
echo '<br/>';

// 6. in_array: Check if a value exists in the array
$exists = in_array(2, $assocArray);
echo "Is the value 2 in the array? " . ($exists ? "Yes" : "No") . "<br/>"; // Yes
echo '<br/>';

// 7. array_reverse: Reverse the array
$reversedArray = array_reverse($array);
echo "After using array_reverse: ";
print_r($reversedArray); // [3, 2, 1]
echo '<br/>';

// 8. array_unique: Remove duplicate values from the array
$duplicateArray = [1, 2, 2, 3, 4, 4, 5];
$uniqueArray = array_unique($duplicateArray);
echo "After using array_unique: ";
print_r($uniqueArray); // [1, 2, 3, 4, 5]
echo '<br/>';

// 9. array_sum: Calculate the sum of the array elements
$sum = array_sum($uniqueArray);
echo "Sum of elements: $sum<br/>"; // 15
echo '<br/>';

// 10. array_filter: Filter the array based on a callback function
$filteredArray = array_filter($uniqueArray, fn($value) => $value > 2);
echo "After using array_filter: ";
print_r($filteredArray); // [3, 4, 5]
echo '<br/>';

// 11. array_shift: Remove the first element from the array
$firstElement = array_shift($array);
echo "Removed element: $firstElement<br/>"; // 1
print_r($array); // [2, 3, 4]
echo '<br/>';

// 12. array_unshift: Add an element to the beginning of the array
array_unshift($array, 1);
echo "After using array_unshift: ";
print_r($array); // [1, 2, 3, 4]
echo '<br/>';

// 13. array_map: Apply a function to each element in the array
$squaredArray = array_map(fn($n) => $n * $n, $array);
echo "After using array_map: ";
print_r($squaredArray); // [1, 4, 9, 16]
echo '<br/>';

// 14. array_walk: Apply a function to each element with its key
array_walk($array, function(&$value, $key) {
    $value *= 2; // Double each element
});
echo "After using array_walk: ";
print_r($array); // [2, 4, 6, 8]
echo '<br/>';

// 15. array_column: Extract a specific column from a multidimensional array
$people = [
    ['name' => 'Osama', 'age' => 22],
    ['name' => 'Abdullah', 'age' => 60],
    ['name' => 'Esmail', 'age' => 100],
];
$names = array_column($people, 'name');
echo "Names: ";
print_r($names); // ["Osama", "Abdullah", "Esmail"]
echo '<br/>';

// 16. array_combine: Create an array from two arrays (keys and values)
$keys = ['a', 'b', 'c'];
$values = [1, 2, 3];
$combinedArray = array_combine($keys, $values);
echo "After using array_combine: ";
print_r($combinedArray); // ["a" => 1, "b" => 2, "c" => 3]
echo '<br/>';

// 17. array_intersect: Get common elements between two arrays
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$intersection = array_intersect($array1, $array2);
echo "Common elements: ";
print_r($intersection); // [2 => 3, 3 => 4]
echo '<br/>';

// 18. array_diff: Get the values in one array that are not present in another
$difference = array_diff($array1, $array2);
echo "Non-common elements: ";
print_r($difference); // [0 => 1, 1 => 2]
echo '<br/>';

// 19. array_rand: Pick a random element from the array
$randomKey = array_rand($array1);
echo "Random element: " . $array1[$randomKey] . "<br/>";
echo '<br/>';

// 20. count: Count the number of elements in the array
$count = count($array1);
echo "Number of elements in the array: $count<br/>";
echo '<br/>';

// String Functions

// 1. strlen: Get the length of the string
$string = "Osama Hamdain";
$length = strlen($string);
echo "Length of the string: $length<br/>"; // 13
echo '<br/>';

// 2. substr: Extract a portion of the string
$substring = substr($string, 6, 7);
echo "Part of the string: $substring<br/>"; // "Hamdain"
echo '<br/>';

// 3. str_replace: Replace a part of the string
$replacedString = str_replace("Hamdain", "Abdullah", $string);
echo "After replacement: $replacedString<br/>"; // "Osama Abdullah"
echo '<br/>';

// 4. strtoupper: Convert the string to uppercase
$upperString = strtoupper($string);
echo "String in uppercase: $upperString<br/>"; // "OSAMA HAMDAIN"
echo '<br/>';

// 5. strtolower: Convert the string to lowercase
$lowerString = strtolower($string);
echo "String in lowercase: $lowerString<br/>"; // "osama hamdain"
echo '<br/>';

// 6. strpos: Find the position of the first occurrence of a substring
$position = strpos($string, "Ham");
echo "Position of 'Ham' in the string: $position<br/>"; // 6
echo '<br/>';

// 7. trim: Remove whitespace from the beginning and end of the string
$trimmedString = trim("   Osama Hamdain   ");
echo "String after trimming: '$trimmedString'<br/>"; // "Osama Hamdain"
echo '<br/>';

// 8. explode: Split the string into an array based on a delimiter
$words = explode(" ", $string);
echo "After using explode: ";
print_r($words); // ["Osama", "Hamdain"]
echo '<br/>';

// 9. implode: Join array elements into a string with a delimiter
$joinedString = implode(", ", $words);
echo "After using implode: $joinedString<br/>"; // "Osama, Hamdain"
echo '<br/>';

// 10. str_repeat: Repeat the string multiple times
$repeatedString = str_repeat("Osama ", 3);
echo "String after repetition: $repeatedString<br/>"; // "Osama Osama Osama "
echo '<br/>';

// 11. str_split: Split the string into an array of characters
$characters = str_split($string);
echo "After using str_split: ";
print_r($characters); // ['O', 's', 'a', 'm', 'a', ' ', 'H', 'a', 'm', 'd', 'a', 'i', 'n']
echo '<br/>';

// 12. substr_replace: Replace a portion of the string with another
$replacedSubstring = substr_replace($string, "Hamdain!", 6, 7);
echo "After using substr_replace: $replacedSubstring<br/>"; // "Osama Hamdain!"
echo '<br/>';

// 13. str_shuffle: Shuffle the characters in the string
$shuffledString = str_shuffle($string);
echo "String after shuffling: $shuffledString<br/>";
echo '<br/>';

// 14. ucwords: Capitalize the first letter of each word
$capitalizedString = ucwords("osama hamdain");
echo "After using ucwords: $capitalizedString<br/>"; // "Osama Hamdain"
echo '<br/>';

// 15. htmlentities: Convert the string to HTML entities
$htmlString = "<div>Osama Hamdain</div>";
$encodedString = htmlentities($htmlString);
echo "String after converting to HTML entities: $encodedString<br/>"; // "&lt;div&gt;Osama Hamdain&lt;/div&gt;"
echo '<br/>';

// 16. nl2br: Convert newlines to HTML <br> tags
$multilineString = "Osama\nHamdain";
$convertedString = nl2br($multilineString);
echo "String after converting newlines: $convertedString<br/>";
echo '<br/>';

// 17. strcasecmp: Case-insensitive string comparison
$string1 = "Osama";
$string2 = "osama";
$comparisonResult = strcasecmp($string1, $string2);
echo "Comparison result: $comparisonResult<br/>"; // 0 (equal)
echo '<br/>';

// 18. str_word_count: Count the number of words in the string
$wordCount = str_word_count($string);
echo "Number of words in the string: $wordCount<br/>"; // 2
echo '<br/>';
?>