<?php

declare(strict_types=1);

use Walrider\Readability\Pattern;
use Walrider\Readability\Readability;

require_once('src/Readability.php');
require_once('src/Pattern.php');

$readability = new Readability(new Pattern());


echo 'Ease score of "Hello World" is ';
echo $readability->easeScore("Hello world");
echo "\n";

$pattern = new Pattern();
echo "Printing size of the first of four pattern arrays: ";
echo sizeof($pattern->{'subtract_syllable_patterns'});
echo "\n";

echo 'Current PHP version: ' . phpversion();
echo "\n";

echo 'Ease score of sample text is ';
echo $readability->easeScore('Heavy metals are generally defined as metals with relatively high densities, atomic weights, or atomic numbers. The criteria used, and whether metalloids are included, vary depending on the author and context. In metallurgy, for example, a heavy metal may be defined on the basis of density, whereas in physics the distinguishing criterion might be atomic number, while a chemist would likely be more concerned with chemical behavior. More specific definitions have been published, but none of these have been widely accepted. The definitions surveyed in this article encompass up to 96 out of the 118 chemical elements; only mercury, lead and bismuth meet all of them.');
echo "\n";
