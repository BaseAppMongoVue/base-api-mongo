<?php

namespace OdontoInn\Repositories\Privilege;

use OdontoInn\Persistences\Mongodb\BaseMongodbAbstractRepository;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class PrivilegeMongodbRepository
 * @package OdontoInn\Repositories\Privilege
 */
class PrivilegeMongodbRepository
    extends BaseMongodbAbstractRepository
    implements PrivilegeRepositoryInterface
{

    /**
     * PrivilegeMongodbRepository constructor.
     * @param Model $model
     * @throws \Exception
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}
