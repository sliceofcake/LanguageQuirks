// PHP equals-sign assignment with arrays can goof
// Read this program, guess what happens, and then check the actual output by running it
// Spoiler : If you ever have a living variable that references part of an array, that part of the array will be ~referenced copied~ when you use equals-sign assignment. Note that if you unset($_) the variable before you make another copy, things will return to normal. To see this, try adding the code line "unset($unused);" immediately after the line where $unused is assigned. Now the copies will remain unchanged, as expected. The conclusion is that you shouldn't trust equals-sign assignment to copy an array, you should always use a custom deep-copy function when you need to copy an array.

// make an array with two key-value pairs
$v = ["a"=>1,"b"=>2];

// copy the array [it actually ~copies~ the array by PHP spec]
$vCopy1 = $v;

// seemingly harmless line here saying that $unused points to the "a" field of $v
$unused = &$v["a"];

// copy the array again, just like we did before, since it would seem like nothing is any different this time around - it should just make another copy - no big deal
$vCopy2 = $v;

// change the "a" field in the original - it shouldn't affect either of the copies
$v["a"] = "ROAR";

// original looks good - changed as expected
var_dump($v);

// copy looks good - no change
var_dump($vCopy1);

// !!! copy changed
var_dump($vCopy2);