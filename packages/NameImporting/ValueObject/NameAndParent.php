<?php

declare (strict_types=1);
namespace Rector\NameImporting\ValueObject;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
final class NameAndParent
{
    /**
     * @var string
     */
    private $shortName;
    /**
     * @var Identifier|Name
     */
    private $nameNode;
    /**
     * @var \PhpParser\Node
     */
    private $parentNode;
    /**
     * @param Name|Identifier $nameNode
     */
    public function __construct(string $shortName, \PhpParser\Node $nameNode, \PhpParser\Node $parentNode)
    {
        $this->shortName = $shortName;
        $this->nameNode = $nameNode;
        $this->parentNode = $parentNode;
    }
    /**
     * @return \PhpParser\Node\Identifier|\PhpParser\Node\Name
     */
    public function getNameNode()
    {
        return $this->nameNode;
    }
    public function getParentNode() : \PhpParser\Node
    {
        return $this->parentNode;
    }
    public function matchShortName(string $desiredShortName) : bool
    {
        return \strtolower($this->shortName) === \strtolower($desiredShortName);
    }
}
