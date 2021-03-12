<?php


namespace cleevio\facade;

use cleevio\enum\SourceType;
use cleevio\model\dto\MySqlWatchDTO;
use cleevio\model\MySqlWatchRepository;
use cleevio\model\XmlWatchLoader;
use cleevio\model\cahe\RedisCache;

class WachFacade
{
    /**
     * @var MySqlWatchRepository
     */
    protected $mySqlWatchRepository;

    /**
     * @var XmlWatchLoader
     */
    protected $xmlWatchLoader;

    /**
     * @var RedisCache
     */
    protected $redisCache;

    /**
     * @param $id
     * @return \cleevio\model\dto\MySqlWatchDTO
     * @throws \cleevio\exception\MySqlRepositoryException
     * @throws \cleevio\exception\MySqlWatchNotFoundException
     */
    public function getWach(mixed $id, string $type = SourceType::DB)
    {
        try
        {
            if (is_numeric($id) && $id <= 0) {
                throw new \Exception("Bad id format.");
            }

            $dtoRow = $this->redisCache->load($id);

            if (!$dtoRow) {
                $dtoRow = $this->getWatchRemote($id, $type);
                $this->redisCache->save($id, $dtoRow);
            }
            return $dtoRow;
        }
        catch (\Exception $e)
        {
            // log
            // ...
            $dtoRow = new MySqlWatchDTO($id, '', 0, '');
        }
        return $dtoRow;
    }

    /**
     * @param mixed $id
     * @param string $type
     * @return MySqlWatchDTO|null
     * @throws \cleevio\exception\MySqlRepositoryException
     * @throws \cleevio\exception\MySqlWatchNotFoundException
     */
    private function getWatchRemote(mixed $id, string $type = SourceType::DB) : ?MySqlWatchDTO
    {
        if($type == SourceType::DB)
        {
            return $this->mySqlWatchRepository->getWatchById((int) $id);
        }
        elseif($type == SourceType::XML)
        {
            $data = $this->xmlWatchLoader->loadByIdFromXml((string) $id);
            return new MySqlWatchDTO($data['id'], $data['title'], $data['price'], $data['desc']);
        }
        return null;
    }
}