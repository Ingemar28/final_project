<?php
    function load_moon($date, $js = false){
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.astronomyapi.com/api/v2/studio/moon-phase',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "format": "png",
            "style": {
                "moonStyle": "default",
                "backgroundStyle": "stars",
                "backgroundColor": "white",
                "headingColor": "white",
                "textColor": "white"
        },
        "observer": {
            "latitude": -27.4705,
            "longitude": 153.0260,
            "date": "'. $date .'"
        },
        "view": {
            "type": "portrait-simple",
            "orientation": "south-up"
        }
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ZWMyZjdhODYtYzA4Mi00ZDkzLTk1M2EtZDU5NDA2N2RjZjQwOmNjNDU3Y2ExNWE4MDI0OTg0ZTljMGVjMmY3MjRkMDkxNGJhNThhMjAwZmU1OWU3ODU1MzhlY2M0ZTM2OTQ5MTRmOGQ4Zjk4NGI5ZTY4NmIyYWJjODBmOTVmMmMxMTYyYjlmZTEzMjVmNWMyYjQ2Y2U1ZTc4ODRiYTMzYjQwNjc5Y2JiZmZiOGQ4YjI3MTIyM2EzNTYzZmVmYTk1NzFkMGViNmQ2Zjc0ODI4ZmU5MjQ2ZTc1Mjk0YTlhNTMxM2E3MTk3OTA1NzI4Y2UyMzA2ZGJkYTFlNDkzZjhlZTY5YjEx',
                'Content-Type: application/json'
            ),
        ));


        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $data = json_decode($response, true);
        
        if(is_array($data)) {
            
            $recordValue = $data["data"];
            
            $recordImage = $recordValue["imageUrl"];
            
        }

        if ($js){
            echo $recordImage;
        }
        else{
            return $recordImage;
        }
        
    }


    function load_star($date, $js = false){

        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.astronomyapi.com/api/v2/studio/star-chart',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "observer": {
                "latitude": -27.4705,
                "longitude": 153.0260,
                "date": "'. $date .'"
            },
            "view": {
                "type": "area",
                "parameters": {
                    "position": {
                        "equatorial": {
                            "rightAscension": 14.83,
                            "declination": -15.23
                        }
                    },
                    "zoom": 2
                }
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ZWMyZjdhODYtYzA4Mi00ZDkzLTk1M2EtZDU5NDA2N2RjZjQwOmNjNDU3Y2ExNWE4MDI0OTg0ZTljMGVjMmY3MjRkMDkxNGJhNThhMjAwZmU1OWU3ODU1MzhlY2M0ZTM2OTQ5MTRmOGQ4Zjk4NGI5ZTY4NmIyYWJjODBmOTVmMmMxMTYyYjlmZTEzMjVmNWMyYjQ2Y2U1ZTc4ODRiYTMzYjQwNjc5Y2JiZmZiOGQ4YjI3MTIyM2EzNTYzZmVmYTk1NzFkMGViNmQ2Zjc0ODI4ZmU5MjQ2ZTc1Mjk0YTlhNTMxM2E3MTk3OTA1NzI4Y2UyMzA2ZGJkYTFlNDkzZjhlZTY5YjEx',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        if(is_array($data)) {

                $recordValue = $data["data"];

                $recordImage = $recordValue["imageUrl"];

        }

        if ($js){
            echo $recordImage;
        }
        else{
            return $recordImage;
        }
        
    }

    $js = $_REQUEST["js"];
    $funname = $_REQUEST["funname"];
    $date = $_REQUEST["date"];

    if ($funname == "load_moon()") {
        load_moon($date, $js);
    }
    else if ($funname == "load_star()") {
        load_star($date, $js);
    }

?>