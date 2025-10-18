<?php
//routes
define("ROUTES", [
    [
        "routes" => ["","home"],
        "fileName" => "home",
        "title" => "Meet & Greet Service",
        "js" => ["home"],
        "css" => ["home"],
        "isCustom" => false
    ],
    [
        "routes" => ["test"],
        "fileName" => "test",
        "title" => "Page Title",
        "js" => ["test"],
        "css" => ["test"],
        "isCustom" => true
    ],
    [
        "routes" => ["step1","selecrPackage"],
        "fileName" => "step1",
        "title" => "Select Package",
        "js" => ["step1"],
        "css" => ["step1"],
        "isCustom" => true
    ],
    [
        "routes" => ["step2"],
        "fileName" => "step2",
        "title" => "Extra Services",
        "js" => ["step2"],
        "css" => ["step2"],
        "isCustom" => true
    ],
    [
        "routes" => ["step3","details"],
        "fileName" => "step3",
        "title" => "Your Details",
        "js" => ["step3"],
        "css" => ["step3"],
        "isCustom" => true
    ],
    [
        "routes" => ["step4","conformation"],
        "fileName" => "step4",
        "title" => "Conformation",
        "js" => ["step4"],
        "css" => ["step4"],
        "isCustom" => true
    ],
    [
        "routes" => ["verification"],
        "fileName" => "verification",
        "title" => "Verification",
        "js" => ["verification"],
        "css" => ["verification"],
        "isCustom" => false
    ],
    [
        "routes" => ["adminHome"],
        "fileName" => "adminHome",
        "title" => "Admin Home",
        "js" => ["adminHome","helpAdminHome"],
        "css" => ["adminHome"],
        "isCustom" => true
    ],
    [
        "routes" => ["userAccount"],
        "fileName" => "userAccount",
        "title" => "User Account",
        "js" => ["userAccount"],
        "css" => ["userAccount"],
        "isCustom" => false
    ],
    [
        "routes" => ["OrderTracker"],
        "fileName" => "OrderTracker",
        "title" => "My Orders",
        "js" => ["OrderTracker"],
        "css" => ["OrderTracker"],
        "isCustom" => false
    ],
]);
