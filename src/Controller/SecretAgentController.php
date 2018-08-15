<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Nacmartin\PhpExecJs\PhpExecJs;

class SecretAgentController
{
    public function code($ssrBundleLocation)
    {

        $phpexecjs = new PhpExecJs();

        $phpexecjs->createContextFromFile($ssrBundleLocation);

        $variant = "sumSecretAgent(3, 4);";

        $result = $phpexecjs->evalJs($variant);

        return new Response(
            '<html><body>Agent code: '.$result.'</body></html>'
        );
    }
}