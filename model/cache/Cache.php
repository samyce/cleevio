<?php


namespace cleevio\model\cahe;


abstract class Cache
{
    abstract function load($id);

    abstract function save($id, $data);
}