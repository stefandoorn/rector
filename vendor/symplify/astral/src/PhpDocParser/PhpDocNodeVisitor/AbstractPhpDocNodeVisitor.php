<?php

declare (strict_types=1);
namespace RectorPrefix20220221\Symplify\Astral\PhpDocParser\PhpDocNodeVisitor;

use PHPStan\PhpDocParser\Ast\Node;
use RectorPrefix20220221\Symplify\Astral\PhpDocParser\Contract\PhpDocNodeVisitorInterface;
/**
 * Inspired by https://github.com/nikic/PHP-Parser/blob/master/lib/PhpParser/NodeVisitorAbstract.php
 */
abstract class AbstractPhpDocNodeVisitor implements \RectorPrefix20220221\Symplify\Astral\PhpDocParser\Contract\PhpDocNodeVisitorInterface
{
    public function beforeTraverse(\PHPStan\PhpDocParser\Ast\Node $node) : void
    {
    }
    /**
     * @return int|Node|null
     */
    public function enterNode(\PHPStan\PhpDocParser\Ast\Node $node)
    {
        return null;
    }
    /**
     * @return null|int|\PhpParser\Node|Node[] Replacement node (or special return)
     */
    public function leaveNode(\PHPStan\PhpDocParser\Ast\Node $node)
    {
        return null;
    }
    public function afterTraverse(\PHPStan\PhpDocParser\Ast\Node $node) : void
    {
    }
}
