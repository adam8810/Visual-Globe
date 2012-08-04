<?php

require_once 'link_JSON.php';

// Simple class used to retrieve JSON data
class GetJSON {

    // This fuction is used to extract specific data formatted in a very
    // specific way. Alter where needed.
    public function parseJSON()
    {
        $jsonurl = JSONURL; // URL should be changed in link_JSON.php
        $json = file_get_contents($jsonurl, 0, null, null);
        $json_output = json_decode($json, true);

        $json_output = $json_output['points'];
        $json_output = $json_output['point'];

        // Alters header so this file is treated as JSON
        header('Content-type: application/json');

        $first = TRUE;
        $count = 0; // TODO: Add count to JSON


        echo '[[[';
        foreach ($json_output as $index => $j)
        {
            if (!$j['ip']) // Eleminate IP data
            {
                if (!$first) // Prevents comma at beginning
                {
                    echo ',';
                }
                
                echo $j['latitude'] . ',';
                echo $j['longitude'] . ',';
                echo '0.03';

                $count++;

                $first = FALSE;
            }
        }
        echo ']]]';
    }

}

GetJSON::parseJSON();
?>