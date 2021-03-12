<?php


namespace cleevio\controller;

use cleevio\facade\WachFacade;
use cleevio\mapper\WatchMapper;

class WatchController
{
    /**
     * @var WachFacade
     */
    private $wachFacade;

    /**
     * /watch/{id}
     *
     * @param $id
     * @throws \cleevio\exception\MySqlRepositoryException
     * @throws \cleevio\exception\MySqlWatchNotFoundException
     */
    public function getByIdAction($id)
    {
        // type can be changed herem via second parameter (by config, etc.)
        $mySqlWatchDTO = $this->wachFacade->getWach($id);

        if($mySqlWatchDTO)
        {
            $this->sendResponse(WatchMapper::mapFromDTO2Json($mySqlWatchDTO));
        }
        $this->sendResponse();
    }
}