<?php

require_once 'link_JSON.php';

class GetJSON {

    public function parseJSON()
    {
        $jsonurl = JSONURL; // URL should be changed in link_JSON.php
        $json = file_get_contents($jsonurl, 0, null, null);
        $json_output = json_decode($json, true);

        $json_output = $json_output['points'];
        $json_output = $json_output['point'];

        header('Content-type: application/json');

        $first = TRUE;
        $count = 0;


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