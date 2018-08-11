<?php

namespace App;

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Process\Process;


function createTemporaryFile($content = null, $extension = null)
{
    $dir = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR);
    if (!is_dir($dir)) {
        if (false === @mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new \RuntimeException(sprintf("Unable to create directory: %s\n", $dir));
        }
    } elseif (!is_writable($dir)) {
        throw new \RuntimeException(sprintf("Unable to write in directory: %s\n", $dir));
    }
    $filename = $dir.DIRECTORY_SEPARATOR.uniqid('ssr_', true);
    if (null !== $extension) {
        $filename .= '.'.$extension;
    }
    if (null !== $content) {
        file_put_contents($filename, $content);
    }
    return $filename;
}

$invariant = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'app.js');

$variant = <<<JS
sum(1, 1);
JS;

$code = $invariant ."\n". $variant;

$embedded = 'process.stdout.write(eval('.json_encode($code).').toString())';

$filename = createTemporaryFile($embedded, 'js');

$process = new Process('node '.$filename);

$process->run();

echo('<html><body>');

echo('My program is: '.$embedded.'<br/>');
echo('Filename: '.$filename.'<br/>');
echo('Exit code: '.$process->getExitCode().'<br/>');
echo('Output: '.$process->getOutput().'<br/>');
echo('Error Output: '.$process->getErrorOutput().'<br/>');

echo('</body></html>');
