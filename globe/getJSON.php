<?php
require_once 'link_JSON.php';

class GetJSON {
    
    private function parseJSON($url = null)
    {
        if ($url != null)
        {
            $jsonurl = jsonurl; // URL should be changed in link_JSON.php
            $json = file_get_contents($jsonurl, 0, null, null);
            $json_output = json_decode($json);

            foreach ($json_output->trends as $trend)
            {
                echo "{$trend->name}\n";
            }
        }
        else
        {
            echo 'No URL provided';
        }
    }

}

GetJSON::yo();

?>