<?php


namespace cleevio\model;

use cleevio\exception\MySqlRepositoryException;
use cleevio\exception\MySqlWatchNotFoundException;
use cleevio\mapper\WatchMapper;
use cleevio\model\dto\MySqlWatchDTO;

class MySqlWatchRepository extends Repository
{
    /**
     * @param int $id
     *
     * @return MySqlWatchDTO
     *
     * @throws MySqlWatchNotFoundException Is thrown when the watch could not be found in a mysql database,
     * eg. watch with the associated id does not exist.
     *
     * @throws MySqlRepositoryException May be thrown on a fatal error, such as connection to a database failed.
     */
    public function getWatchById(int $id) : MySqlWatchDTO
    {
        $row = $this->getById($id);

        if(!$row)
        {
            throw new MySqlWatchNotFoundException();
        }
        return WatchMapper::mapFromDb2DTO($row);
    }

    /**
     * @param int $id
     * @return BD row
     * @throws MySqlRepositoryException
     */
    public function getById(int $id)
    {
        try
        {
            return parent::getById($id);
        }
        catch (\Exception $e)
        {
            throw new MySqlRepositoryException($e->getMessage(), $e->getCode());
        }
    }
}