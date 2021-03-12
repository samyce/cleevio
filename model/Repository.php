<?php


namespace cleevio\model;

class Repository
{
    // db connector
    protected $context;

    /**
     * @param int $id
     * @return BD row
     */
    public function getById(int $id)
    {
        return $this->context->findById($id)->fetch();
    }
}