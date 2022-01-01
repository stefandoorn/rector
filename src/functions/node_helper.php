<?php

declare (strict_types=1);
namespace RectorPrefix20220101;

use PhpParser\Node;
use PhpParser\PrettyPrinter\Standard;
use RectorPrefix20220101\Tracy\Dumper;
if (!\function_exists('dn')) {
    function dn(\PhpParser\Node $node, int $depth = 2) : void
    {
        \RectorPrefix20220101\dump_node($node, $depth);
    }
}
if (!\function_exists('dump_node')) {
    /**
     * @param mixed[]|\PhpParser\Node $node
     */
    function dump_node($node, int $depth = 2) : void
    {
        $nodes = \is_array($node) ? $node : [$node];
        foreach ($nodes as $node) {
            \RectorPrefix20220101\Tracy\Dumper::dump($node, [\RectorPrefix20220101\Tracy\Dumper::DEPTH => $depth]);
        }
    }
}
if (!\function_exists('print_node')) {
    /**
     * @param mixed[]|\PhpParser\Node $node
     */
    function print_node($node) : void
    {
        $standard = new \PhpParser\PrettyPrinter\Standard();
        $nodes = \is_array($node) ? $node : [$node];
        foreach ($nodes as $node) {
            $printedContent = $standard->prettyPrint([$node]);
            \RectorPrefix20220101\Tracy\Dumper::dump($printedContent);
        }
    }
}
