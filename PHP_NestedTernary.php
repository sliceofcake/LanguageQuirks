// PHP doesn't evaluate nested ternary-conditional operators correctly without explicit parentheses

// the result is 2, even though it ~should~ be 1
echo TRUE ? 1 : TRUE ? 2 : 3;

// the result is 1, just like it should be even without explicit parentheses
echo TRUE ? 1 : (TRUE ? 2 : 3);