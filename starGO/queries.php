<?php


function insertOrUpdateParks($id, $objectId, $parkNumber, $parkName, $sapAssetId, $houseNumber, $streetAddress, $suburb, $postCode, $longitude, $latitude, $shapeLength, $shapeArea) {

    $query = MySQL::getInstance()->prepare(
        "INSERT INTO park (id, objectId, parkNumber, parkName, sapAssetId, houseNumber, streetAddress, suburb, postCode, longitude, latitude, shapeLength, shapeArea)
        VALUES (:_id, :OBJECTID, :PARK_NUMBER, :PARKNAME, :SAP_ASSET_ID, :HOUSE_NUMBER, :STREET_ADDRESS, :SUBURB, :POST_CODE, :LONG, :LAT, :SHAPE_Length, :SHAPE_Area)
        "
    );

    $query->bindValue(':_id', $id, PDO::PARAM_INT);
    $query->bindValue(':OBJECTID', $objectId, PDO::PARAM_INT);
    $query->bindValue(':PARK_NUMBER', $parkNumber, PDO::PARAM_STR);
    $query->bindValue(':PARK_NAME', $parkName, PDO::PARAM_STR);
    $query->bindValue(':SAP_ASSET_ID', $sapAssetId, PDO::PARAM_STR);
    $query->bindValue(':HOUSE_NUMBER', $houseNumber, PDO::PARAM_STR);
    $query->bindValue(':STREET_ADDRESS', $streetAddress, PDO::PARAM_STR);
    $query->bindValue(':SUBURB', $suburb, PDO::PARAM_STR);
    $query->bindValue(':POST_CODE', $postCode, PDO::PARAM_INT);
    $query->bindValue(':LONG', $longitude, PDO::PARAM_INT);
    $query->bindValue(':LAT', $latitude, PDO::PARAM_INT);
    $query->bindValue(':SHAPE_Length', $shapeLength, PDO::PARAM_INT);
    $query->bindValue(':SHAPE_Area', $shapeArea, PDO::PARAM_INT);

    // $query->bindValue(':_idUpdate', $id, PDO::PARAM_INT);
    // $query->bindValue(':OBJECTIDUpdate', $objectId, PDO::PARAM_INT);
    // $query->bindValue(':PARK_NUMBERUpdate', $parkNumber, PDO::PARAM_STR);
    // $query->bindValue(':PARK_NAMEUpdate', $parkName, PDO::PARAM_STR);
    // $query->bindValue(':SAP_ASSET_IDUpdate', $sapAssetId, PDO::PARAM_STR);
    // $query->bindValue(':HOUSE_NUMBERUpdate', $houseNumber, PDO::PARAM_STR);
    // $query->bindValue(':STREET_ADDRESSUpdate', $streetAddress, PDO::PARAM_STR);
    // $query->bindValue(':SUBURBUpdate', $suburb, PDO::PARAM_STR);
    // $query->bindValue(':POST_CODEUpdate', $postCode, PDO::PARAM_INT);
    // $query->bindValue(':LONGUpdate', $longitude, PDO::PARAM_INT);
    // $query->bindValue(':LATUpdate', $latitude, PDO::PARAM_INT);
    // $query->bindValue(':SHAPE_LengthUpdate', $shapeLength, PDO::PARAM_INT);
    // $query->bindValue(':SHAPE_AreaUpdate', $shapeArea, PDO::PARAM_INT);

    $query->execute();
}


?>