<?php

declare (strict_types=1);
namespace Rector\Privatization\ValueObject;

final class ConstantVisibility
{
    /**
     * @var bool
     */
    private $isPublic;
    /**
     * @var bool
     */
    private $isProtected;
    /**
     * @var bool
     */
    private $isPrivate;
    public function __construct(bool $isPublic, bool $isProtected, bool $isPrivate)
    {
        $this->isPublic = $isPublic;
        $this->isProtected = $isProtected;
        $this->isPrivate = $isPrivate;
    }
    public function isPublic() : bool
    {
        return $this->isPublic;
    }
    public function isProtected() : bool
    {
        return $this->isProtected;
    }
    public function isPrivate() : bool
    {
        return $this->isPrivate;
    }
}
