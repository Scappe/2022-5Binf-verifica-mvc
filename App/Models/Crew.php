<?php

namespace App\Models;

use PDO;


class Crew extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $query = $db->query('select distinct name from crews');
        $crews = array();

        if ($query->num_rows > 0) {
            while($row = $query->fetch_assoc()) {
                $crewName = $row["name"];
                $piratesQuery = $db->query("select pirates.name from pirates join crews on pirates.pirate_id = crews.members  where crews.name ='".$crewName."'");
                $pirates = array();
                if($piratesQuery->num_rows > 0){
                    while($pirateRow = $piratesQuery->fetch_assoc()){
                        array_push($pirates, $pirateRow["name"]);
                    }
                }
                $crew = array(
                    "name" => $crewName,
                    "pirates" => $pirates,
                );
                array_push($crews, $crew);
            }
        }
        static::closeDB();
        return $crews;
    }
}
