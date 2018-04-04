<?php
                        error_log("qqqqqq\n", 3, "../errors.txt");

include "../models/foodRepository.php";

                        error_log("sssssssssssssss\n", 3, "../errors.txt");

$config = array(
    "db" => "mysql:host=localhost;dbname=paulsite",
    "username" => "root",
    "password" => "mandarin02"
);

$db = new PDO($config["db"], $config["username"], $config["password"]);
$food = new foodRepository($db);
                        error_log("isnid", 3, "../errors.txt");

                        error_log($_SERVER["REQUEST_METHOD"], 3, "../errors.txt");

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
                        error_log("isnid", 3, "../errors.txt");

        $result = $food->getAll(array(
            "name" => $_GET["name"],
            "address" => $_GET["address"],
            "secondary_street" => $_GET["secondary_street"],
            "city" => $_GET["city"],
            "zip" => $_GET["zip"],
        ));
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


header("Content-Type: application/json");
echo json_encode($result);

?>
