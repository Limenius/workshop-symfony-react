<?php

namespace App;

require __DIR__ . '/vendor/autoload.php';

use Nacmartin\PhpExecJs\PhpExecJs;

$phpexecjs = new PhpExecJs();

$phpexecjs->createContextFromFile(__DIR__.DIRECTORY_SEPARATOR.'app.js');

$variant = <<<JS
sum(1, 1);
JS;

$result = $phpexecjs->evalJs($variant);

echo('<html><body>');

echo('Output: '.$result);

echo('</body></html>');
