<?php

function get_apartments() {
    global $link;

    $sql = 'CALL get_all_apartments();'; 
    $result = mysqli_query($link, $sql);
    $apartments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $apartments;
}

function get_houses() {
    global $link;
    
    $sql = 'CALL get_all_houses();';
    $result = mysqli_query($link, $sql);
    $houses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $houses;
}

function get_feedbacks() {
    global $link;
    
    $sql = 'CALL get_all_feedbacks();';
    $result = mysqli_query($link, $sql);
    $feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $feedbacks;
}

function get_house_by_id($house_id) {
    global $link;

    $sql = 'CALL get_house_by_id('.$house_id.');';
    $result = mysqli_query($link, $sql);
    $house = mysqli_fetch_assoc($result);

    return $house;
}

function get_apartment_by_id($apartment_id) {
    global $link;

    $sql = 'CALL get_apartment_by_id('.$apartment_id.');';
    $result = mysqli_query($link, $sql);
    $apartment = mysqli_fetch_assoc($result);

    return $apartment;
}

