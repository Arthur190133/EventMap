<?php 
class UserWarned{
    private $connection;
    private $table = 'userwarned';

    //parametres
    public $UserWarnedId;
    public $UserWarnedContext;
    public $UserWarnedStartDate;
    public $UserWarnedEndDate;
    public $UserId;
    public $SuperAdminId;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }
    public function readWarn(){
        $query = 'SELECT 
        userwarned.UserWarnedContext,
        userwarned.UserWarnedStartDate,
        userwarned.UserWarnedEndDate,
        userwarned.UserId,
        userwarned.SuperAdminId
        FROM ' . $this->table .' userwarned';

        $stmt = $this->connection->prepare($query);
 
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->UserWarnedContext = $row['UserWarnedContext'];
        $this->UserWarnedStartDate = $row['UserWarnedStartDate'];
        $this->UserWarnedEndDate = $row['UserWarnedEndDate'];
        $this->UserId = $row['UserId'];
        $this->SuperAdminId = $row['SuperAdminId'];
        
        return $stmt;
    }
    public function create(){
        $querry = "INSERT INTO " . $this->table . '
        (AdminStartDate, AdminEndDate, UserId)
        VALUES
        (:StartDate, :EndDate, :Id)';

        $stmt = $this->connection->prepare($query);

        $this->UserWarnedContext = htmlspecialchars(strip_tags($this->UserWarnedContext));
        $this->UserWarnedStartDate = htmlspecialchars(strip_tags($this->UserWarnedStartDate));
        $this->UserWarnedEndDate = htmlspecialchars(strip_tags($this->UserWarnedEndDate));
        $this->UserId = date('Y-m-d', strtotime($this->UserId));
        

        $stmt->bindParam(':UserWarnedContext', $this->UserWarnedContext);
        $stmt->bindParam(':UserWarnedStartDate', $this->UserWarnedStartDate);
        $stmt->bindParam(':UserWarnedEndDate', $this->UserWarnedEndDate);
        $stmt->bindParam(':UserId', $this->UserId);
        
        
        if($stmt->execute()){
            return true;
        }
        else{
            printf("Error: %s. \n", $stmt->error);
            return false;
        }
    }

}
?>