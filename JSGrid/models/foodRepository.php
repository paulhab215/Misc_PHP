<?php

include "food.php";

class foodRepository {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        $result = new food();
        $result->food_id = $row['food_id'];
        $result->name = $row['name'];
        $result->street = $row['street'];
        $result->secondary_street = $row['secondary_street'];
        $result->city = $row['city'];
        $result->zip = $row['zip'];
        $result->bio = $row['bio'];
        $result->yelp_link = $row['yelp_link'];
        $result->type = $row['type'];
        $result->rank = $row['rank'];
        return $result;
    }

    public function getById($food_id) {
        $sql = "SELECT * FROM food WHERE food_id = :food_id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":food_id", $food_id, PDO::PARAM_INT);
        $q->execute();
        $rows = $q->fetchAll();
        return $this->read($rows[0]);
    }

    public function getAll() {
        // $name = "%" . $filter["name"] . "%";
        // $address = "%" . $filter["street"] . "%";
        // $country_id = $filter["zip"];
        // $sql = "SELECT * FROM food WHERE name LIKE :name AND street LIKE :street AND (:zip = 0 OR zip = :zip)";
        $sql = "SELECT * FROM food";
        $q = $this->db->prepare($sql);
        $q->bindParam(":food_id", $food_id);
        $q->bindParam(":name", $name);
        $q->bindParam(":street", $street);
        $q->bindParam(":secondary_street", $secondary_street);
        $q->bindParam(":city", $city);
        $q->bindParam(":zip", $zip);
        $q->bindParam(":bio", $bio);
        $q->bindParam(":yelp_link", $yelp_link);
        $q->bindParam(":type", $type);
        $q->bindParam(":rank", $rank);
        $q->execute();
        $rows = $q->fetchAll();
        $result = array();

        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
    }    

    public function insert($data) {
        $sql = "INSERT INTO food (name, street, secondary_street, city, zip) VALUES (:name, :street, :secondary_street, :city, :zip)";
        $q = $this->db->prepare($sql);
        $q->bindParam(":name", $data['name']);
        $q->bindParam(":street", $data['street']);
        $q->bindParam(":secondary_street", $data['secondary_street']);
        $q->bindParam(":city", $data['city']);
        $q->bindParam(":zip", $data['zip']);
        // $q->bindParam(":bio", $data['bio']);
        // $q->bindParam(":yelp_link", $data['yelp_link']);
        // $q->bindParam(":type", $data['type']);
        // $q->bindParam(":rank", $data['rank'], PDO::PARAM_INT);
        $q->execute();
        return $this->getById($this->db->lastInsertId());
    }

    public function update($data) {
        $sql = "UPDATE food SET name = :name, street = :street, secondary_street = :secondary_street, city = :city, zip = :zip WHERE food_id = :food_id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":name", $data['name']);
        $q->bindParam(":street", $data['street']);
        $q->bindParam(":secondary_street", $data['secondary_street']);
        $q->bindParam(":city", $data['city']);
        $q->bindParam(":zip", $data['zip']);
        // $q->bindParam(":bio", $data['bio']);
        // $q->bindParam(":yelp_link", $data['yelp_link']);
        // $q->bindParam(":type", $data['type']);
        // $q->bindParam(":rank", $data['rank'], PDO::PARAM_INT);
        $q->execute();
    }

    public function remove($food_id) {
        $sql = "DELETE FROM food WHERE food_id = :food_id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":food_id", $food_id, PDO::PARAM_INT);
        $q->execute();
    }

}

?>