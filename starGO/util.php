<?php

    function parseGeo($geo) {
        if ($geo) {
            preg_match('/-?\d+\.\d+,-?\d+\.\d+/', $geo, $matches);
            return $matches[0];
        }
    }

    function updateParks(){
        $parks_rul = "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search";
        $data = file_get_contents($parks_url);
        $data = json_decode($data, true);

        foreach ($data as $recordKey => $recordValue) {

            // $id = $recordValue['_id'];
            // $objectId = $recordValue['OBJECTID'];
            // $parkNumber = $recordValue['PARK_NUMBER'];
            // $parkName = $recordValue['PARK_NAME'];
            // $sapAssetId = $recordValue['SAP_ASSET_ID'];
            // $houseNumber = $recordValue['HOUSE_NUMBER'];
            // $streetAddress = $recordValue['STREETADDRESS'];
            // $suburb = $recordValue['SUBURB'];
            // $postCode = $recordValue['POST_CODE'];
            // $longitude = $recordValue['LONG'];
            // $latitude = $recordValue['LAT'];
            // $shapeLength = $recordValue['SHAPE_Length'];
            // $shapeArea = $recordValue['SHAPE_Area'];

            // if ($house == "") {
            //     $house = NULL;
            // }
            echo “<p>”.print_r($data, true).”</p>”;

            insertOrUpdateParks($id, $objectId, $parkNumber, $parkName, $sapAssetId, $houseNumber, $streetAddress,
            $suburb, $postCode, $longitude, $latitude, $shapeLength, $shapeArea);

        }
    }


    function updateSites() {

        $site_url = "https://www.bnefoodtrucks.com.au/api/1/sites";

        // Query the sites endpoint
        $data = file_get_contents($site_url);
        $data = json_decode($data, true);

        // Loop through each site in the dataset
        foreach ($data as $recordKey => $recordValue) {
    
            $site_id = $recordValue['site_id'];
            $title = $recordValue['title'];
            $street = $recordValue['street'];
            $suburb = $recordValue['suburb'];
            $state = $recordValue['state'];
            $postcode = $recordValue['postcode'];
            $location = $title."<br>".$street.", ".$suburb.", ".$state.", ".$postcode;
            $latitude = $recordValue['latitude'];
            $longitude = $recordValue['longitude'];

            // insert the site into the database
            // if it already exists, update the values
            insertOrUpdateSites($site_id, $location, $latitude, $longitude);

        }

    }

    function updateBookings() {

        $foodtruck_url = "https://www.bnefoodtrucks.com.au/api/1/bookings";

        // Query the bookings endpoint
        $data = file_get_contents($foodtruck_url);
        $data = json_decode($data, true);

        // Loop through each booking in the dataset
        foreach ($data as $recordKey => $recordValue) {

            $title = $recordValue['title'];
            $truck_id = $recordValue['truck_id'];
            $site_id = $recordValue['site_id'];

            // parse the datetime for inserting into the database
            $start = strtotime($recordValue['start']);
            $end = strtotime($recordValue['finish']);

            $start = date('Y-m-d H:i:s', $start);
            $end = date('Y-m-d H:i:s', $end);

            // insert the booking into the database
            // if it already exists, update the values
            insertOrUpdateBookings($title, $truck_id, $site_id, $start, $end);

        }

    }

    function updatePrivateBookings() {

        $foodtruck_url = "https://www.bnefoodtrucks.com.au/api/1/private-bookings";

        // Query the private bookings  endpoint
        $data = file_get_contents($foodtruck_url);
        $data = json_decode($data, true);

        // Loop through each booking in the dataset
        foreach ($data as $recordKey => $recordValue) {

            $title = $recordValue['title'];
            $truck_id = $recordValue['Food truck'];
            $location = $recordValue['Address'];

            // parse the geolocation point into lat lng
            $geolocation = parseGeo($recordValue['Geolocation']);
            $latlng = explode(',', $geolocation);
            $latitude = $latlng[1];
            $longitude = $latlng[0];

            $location = preg_replace('/,/', "<br>", $location, 1);
            $location = preg_replace('/,/', ", ", $location);

            // parse the datetime for inserting into the database            
            $start = strtotime($recordValue['start']);
            $end = strtotime($recordValue['finish']);

            $start = date('Y-m-d H:i:s', $start);
            $end = date('Y-m-d H:i:s', $end);

            // insert the private booking into the database
            // if it already exists, update the values
            insertOrUpdatePrivateBookings($title, $truck_id, $start, $end, $location, $latitude, $longitude);

        }

    }

?>