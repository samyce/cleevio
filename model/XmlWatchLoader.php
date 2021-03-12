<?php


namespace cleevio\model;

use cleevio\mapper\WatchMapper;

class XmlWatchLoader
{
    /**
     * @param string $watchIdentification
     * @return array|null
     * @throws XmlLoaderException
     */
    public function loadByIdFromXml(string $watchIdentification): ?array
    {
        $data = null;
        try
        {
            // get something by $watchIdentification
            //      handle parsing, file downloading, etc.

            // dummy result
            $xml = self::getDummy();

            $data = WatchMapper::mapFromXml2Array($xml);
        }
        catch (\Exception $e)
        {
            throw new XmlLoaderException();
        }
        return $data;
    }

    /**
     * Just for demonstration
     * @return object
     */
    private static function getDummy() : \stdClass
    {
        $data = [
            'id' => 1,
            'title' => 'dummy title',
            'price' => 0,
            'desc' => 'dummy description'
        ];

        return (object)$data;
    }
}