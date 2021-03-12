<?php


namespace cleevio\mapper;


use cleevio\model\dto\MySqlWatchDTO;

class WatchMapper
{
    /**
     * @param $row DB row
     * @return MySqlWatchDTO
     */
    public static function mapFromDb2DTO($row) : MySqlWatchDTO
    {
        return new MySqlWatchDTO($row->id, $row->title, $row->price, $row->description);
    }

    /**
     * @param MySqlWatchDTO $mySqlWatchDTO
     * @return string|null
     */
    public static function mapFromDTO2Json(MySqlWatchDTO $mySqlWatchDTO) : ?string
    {
        if($mySqlWatchDTO)
        {
            $data = [
                "identification"    => $mySqlWatchDTO->id,
                "title"             => $mySqlWatchDTO->title,
                "price"             => $mySqlWatchDTO->price,
                "description"       => $mySqlWatchDTO->description
            ];
            return json_encode($data);
        }
        return null;
    }

    public static function mapFromXml2Array(\stdClass $xml)
    {
        return [
            'id' => $xml->id,
            'title' => $xml->title,
            'price' => $xml->price,
            'desc' => $xml->desc
        ];
    }
}