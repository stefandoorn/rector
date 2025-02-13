<?php

declare (strict_types=1);
namespace Rector\Core\NodeAnalyzer;

use PhpParser\Node;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Global_;
use PhpParser\Node\Stmt\Static_;
use PhpParser\Node\Stmt\StaticVar;
use Rector\Core\PhpParser\Comparing\NodeComparator;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\NodeTypeResolver\Node\AttributeKey;
final class VariableAnalyzer
{
    /**
     * @readonly
     * @var \Rector\Core\PhpParser\Node\BetterNodeFinder
     */
    private $betterNodeFinder;
    /**
     * @readonly
     * @var \Rector\Core\PhpParser\Comparing\NodeComparator
     */
    private $nodeComparator;
    public function __construct(\Rector\Core\PhpParser\Node\BetterNodeFinder $betterNodeFinder, \Rector\Core\PhpParser\Comparing\NodeComparator $nodeComparator)
    {
        $this->betterNodeFinder = $betterNodeFinder;
        $this->nodeComparator = $nodeComparator;
    }
    public function isStaticOrGlobal(\PhpParser\Node\Expr\Variable $variable) : bool
    {
        if ($this->isParentStaticOrGlobal($variable)) {
            return \true;
        }
        return (bool) $this->betterNodeFinder->findFirstPreviousOfNode($variable, function (\PhpParser\Node $n) use($variable) : bool {
            if (!\in_array(\get_class($n), [\PhpParser\Node\Stmt\Static_::class, \PhpParser\Node\Stmt\Global_::class], \true)) {
                return \false;
            }
            /**
             * @var Static_|Global_ $n
             * @var StaticVar[]|Variable[] $vars
             */
            $vars = $n->vars;
            foreach ($vars as $var) {
                $staticVarVariable = $var instanceof \PhpParser\Node\Stmt\StaticVar ? $var->var : $var;
                if ($this->nodeComparator->areNodesEqual($staticVarVariable, $variable)) {
                    return \true;
                }
            }
            return \false;
        });
    }
    private function isParentStaticOrGlobal(\PhpParser\Node\Expr\Variable $variable) : bool
    {
        $parentNode = $variable->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE);
        if (!$parentNode instanceof \PhpParser\Node) {
            return \false;
        }
        if ($parentNode instanceof \PhpParser\Node\Stmt\Global_) {
            return \true;
        }
        if (!$parentNode instanceof \PhpParser\Node\Stmt\StaticVar) {
            return \false;
        }
        $parentParentNode = $parentNode->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::PARENT_NODE);
        return $parentParentNode instanceof \PhpParser\Node\Stmt\Static_;
    }
}
