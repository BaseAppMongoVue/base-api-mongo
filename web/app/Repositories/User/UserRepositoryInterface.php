<?php

namespace OdontoInn\Repositories\User;

use OdontoInn\Interfaces\IRepository;

/**
 * Interface UserRepositoryInterface
 * @package OdontoInn\Repositories\User
 */
interface UserRepositoryInterface extends IRepository
{
    /**
     * @param $data
     * @return mixed
     */
    public function search($data);

    /**
     * @param $data
     * @return mixed
     */
    public function getDataUserLogin(array $data);

    /**
     * @param array $request
     * @return bool|mixed
     */
    public function checkToken(array $request);

}
