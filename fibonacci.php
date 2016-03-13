<?php
$generator = fibonacci();
foreach ($generator as $i) {
	echo "$i\n";
}

function fibonacci() {
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
?>