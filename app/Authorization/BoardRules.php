<?php namespace App\Authorization;

use App\Json\Schemes\BoardScheme as Scheme;
use Limoncello\Application\Contracts\Authorization\ResourceAuthorizationRulesInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyInformation\ContextInterface;
use Settings\Passport;

/**
 * @package App
 */
class BoardRules implements ResourceAuthorizationRulesInterface
{
    use RulesTrait;

    /** Action name */
    const ACTION_VIEW_BOARDS = 'canViewBoards';

    /** Action name */
    const ACTION_ADMIN_BOARDS = 'canAdminBoards';

    /**
     * @inheritdoc
     */
    public static function getResourcesType(): string
    {
        return Scheme::TYPE;
    }

    /**
     * @param ContextInterface $context
     *
     * @return bool
     */
    public static function canViewBoards(ContextInterface $context): bool
    {
        assert($context);

        return true;
    }

    /**
     * @param ContextInterface $context
     *
     * @return bool
     */
    public static function canAdminBoards(ContextInterface $context): bool
    {
        return self::hasScope($context, Passport::SCOPE_ADMIN_BOARDS);
    }
}
