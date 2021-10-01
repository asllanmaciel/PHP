<?php
 
/**
 * Recursive find and replace
 *
 * We have a multidimensional array and have to find and replace some values.
 * It would be the best if the result is the same array with values changed.
 *
 * It is quite straightforward but I will explain anyway. Function first
 * checks if $array is actually an array and if it isn't, it returns
 * regular str_replace. If it is an array, we are creating empty array $newArray.
 *
 * We advance through the given array by key and value and call recursively
 * the same function. This time $array is not an array and the function
 * returns regular str_replace, which is our value.
 *
 * @link http://www.codeforest.net/quick-snip-recursive-find-and-replace
 *
 * @param string $find
 * @param string $replace
 * @param array|string $array
 * @return mixed|multitype:mixed
 */
function rec_array_replace ($find, $replace, $array)
{
    if (! is_array($array)) {
        return str_replace($find, $replace, $array);
    }
 
    $newArray = array();
 
    foreach ($array as $key => $value) {
        $newArray[$key] = rec_array_replace($value);
    }
 
    return $newArray;
}
 
?>
