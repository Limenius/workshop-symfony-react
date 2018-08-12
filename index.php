<?php

namespace App;

require __DIR__ . '/vendor/autoload.php';

use Nacmartin\PhpExecJs\PhpExecJs;

$phpexecjs = new PhpExecJs();

$phpexecjs->createContextFromFile(__DIR__.DIRECTORY_SEPARATOR.'dist'.DIRECTORY_SEPARATOR.'main.js');

$variant = <<<JS
sumSpy(3, 4);
JS;

$result = $phpexecjs->evalJs($variant);

echo('<html><body>');

echo('Output: '.$result);

echo('</body></html>');
