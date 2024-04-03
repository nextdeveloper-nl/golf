<?php

namespace NextDeveloper\Golf\Authorization\Roles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Helpers\UserHelper;

class GolfAgentRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'golf-agent';

    public const LEVEL = 120;

    public const DESCRIPTION = 'Golfer Agent';

    public const DB_PREFIX = 'golf';

    /**
     * Applies basic member role sql for Eloquent
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        /**
         * Here user will be able to list all models, because by default, sales manager can see everybody.
         */

    }

    public function checkPrivileges(Users $users = null)
    {
        //return UserHelper::hasRole(self::NAME, $users);
    }

    public function getModule()
    {
        return 'golf';
    }

    public function allowedOperations() :array
    {
        return [
            'golf_courses:read',
            'golf_courses:update',
            'golf_courses:create',
            'golf_courses:delete',
            'golf_clubs:read',
            'golf_clubs:update',
            'golf_clubs:create',
            'golf_clubs:delete',
            'golf_reservations:read',
            'golf_reservations:update',
            'golf_reservations:create',
            'golf_reservations:delete',
            'golf_tee_times:read',
            'golf_tee_times:update',
            'golf_tee_times:create',
            'golf_tee_times:delete'
        ];
    }

    public function getLevel(): int
    {
        return self::LEVEL;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function canBeApplied($column)
    {
        if(self::DB_PREFIX === '*') {
            return true;
        }

        if(Str::startsWith($column, self::DB_PREFIX)) {
            return true;
        }

        return false;
    }

    public function getDbPrefix()
    {
        return self::DB_PREFIX;
    }
}
