<?php

namespace OdontoInn\Repositories\Role;

use OdontoInn\Persistences\Mongodb\BaseMongodbAbstractRepository;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class RoleMongodbRepository
 * @package OdontoInn\Repositories\Role
 */
class RoleMongodbRepository
    extends BaseMongodbAbstractRepository
    implements RoleRepositoryInterface
{

    /**
     * RoleMongodbRepository constructor.
     * @param Model $model
     * @throws \Exception
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}
