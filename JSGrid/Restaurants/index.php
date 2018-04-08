<?php

include "../models/foodRepository.php";
include "../db/config.php";


$db = new PDO($config["db"], $config["username"], $config["password"]);
$food = new foodRepository($db);

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $food->getAll();
        break;

    case "POST":
        $result = $food->insert(array(
            "name" => $_POST["name"],
            "address" => $_POST["address"],
            "secondary_street" => $_POST["secondary_street"],
            "city" => $_POST["city"],
            "zip" => $_POST["zip"],
        ));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        $result = $food->update(array(
            "name" => $_PUT["name"],
            "address" => $_PUT["address"],
            "secondary_street" => $_PUT["secondary_street"],
            "city" => $_PUT["city"],
            "zip" => $_PUT["zip"],
        ));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        $result = $food->remove(intval($_DELETE["food_id"]));
        break;
}

echo json_encode($result);

?>
