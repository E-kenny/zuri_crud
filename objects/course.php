<?php
// 'course' object
class Course{
 
    // database connection and table name
    private $conn;
    private $table_name = "courses";
 
    // object properties
    public $Id;
    public $course;
    public $course_code;
    public $user_id;
    public $created;
    public $updated;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

// create course
function create(){
  
    //write query
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                course=:course, course_code=:course_code, user_id=:user_id";

    $stmt = $this->conn->prepare($query);

    // posted values
    $this->course=htmlspecialchars(strip_tags($this->course));
    $this->course_code=htmlspecialchars(strip_tags($this->course_code));
    $this->created=htmlspecialchars(strip_tags($this->created));

    // to get time-stamp for 'created' field
    //$this->created = date('Y-m-d H:i:s');

    // bind values 
    $stmt->bindParam(":course", $this->course);
    $stmt->bindParam(":course_code", $this->course_code);
    $stmt->bindParam(":user_id", $this->user_id);
    // $stmt->bindParam(":created", $this->created);

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

}

function readAll(){
  
    $query = "SELECT
                Id, course, course_code, user_id, created, updated
            FROM
                " . $this->table_name . "
            WHERE
            user_id=:id";
      
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(":id", $this->Id);

    $stmt->execute();
  
    return $stmt;
}

function readOne(){
  
    $query = "SELECT
                course, course_code, created, updated
            FROM
                " . $this->table_name . "
            WHERE
                Id = ?
            LIMIT
                0,1";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->Id);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    $this->course = $row['course'];
    $this->course_code = $row['course_code'];
    $this->created = $row['created'];
    $this->updated = $row['updated'];
}

function update(){
    echo  $this->user_id;
 $query = "UPDATE " . "$this->table_name" . " SET
                course=:course,
                course_code=:course_code,
                updated=:updated 
                 WHERE
                (Id=:id) AND (user_id=:user_id)";
    $stmt = $this->conn->prepare($query);

    
    // to get time-stamp for 'updated' field
    $this->updated = date('Y-m-d H:i:s');
  
    // posted values
    $this->Id=htmlspecialchars(strip_tags($this->Id));
    $this->course=htmlspecialchars(strip_tags($this->course));
    $this->course_code=htmlspecialchars(strip_tags($this->course_code));
    $this->updated=htmlspecialchars(strip_tags($this->updated));
  
    // bind parameters
    $stmt->bindParam(":course", $this->course);
    $stmt->bindParam(":course_code", $this->course_code);
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":updated", $this->updated);
    $stmt->bindParam(":id", $this->Id);
    $stmt->execute();
    // execute the query
    if($stmt->rowCount() > 0){
        return true;
    }
  
    return false;
      
}

// delete the product
function delete(){
  
    $query = "DELETE FROM " . $this->table_name . " WHERE Id =:id AND user_id=:user_id";
      
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}

}
