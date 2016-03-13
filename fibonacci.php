<?php
// Using Generators

$generator = fibonacci_gen();
foreach ($generator as $i) {
	echo "$i\n";
}


// Using recursion
fibonacci();

echo "\nMemory Usage: " . memory_get_usage();

function fibonacci_gen() {
	if (version_compare(phpversion(), '5.5.0', '>=')) {
		// 5.4.0 supports short array syntax
		// 5.5.0 supports generators (yield)
		list($a, $b) = [0, 1];
		do {
			yield $a;
			list($a, $b) = [$b, $a+$b];
		} while ($a !== INF);
	} else { return; }
}

function fibonacci($a = 0, $b = 1, $end = INF) {
	// This is the more portable solution
	// Should be supported in PHP 4, PHP 5, PHP 7+
	echo "$a\n";
	list($a, $b) = array($b, $a+$b);
	if ($a < $end + 1) {
		fibonacci($a, $b, $end);
	}
}
