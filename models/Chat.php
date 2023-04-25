<?php

class Chat{
        // Database
        private $connection;
        private $table = 'chat';

        // propriétés du chat
        public $ChatId;
        public $EventId;
        public $Messages;


        // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }


    // récuperer tous les chats
    public function readAll()
    {
        $query = 'SELECT 
            chat.ChatId,
            chat.EventId as EventId,
            (SELECT count(*) from ChatMessage where chat.ChatId = ChatId) as Messages
            FROM ' . $this->table .' chat
            ';

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
    }

    // récuperer un seul chat
    public function readSingle(){
        $query = 'SELECT 
        chat.ChatId,
        chat.EventId as EventId,
        (SELECT count(*) from ChatMessage where chat.ChatId = ChatId) as Messages
        FROM ' . $this->table .' chat
        WHERE chat.ChatId = ? 
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->BindParam(1, $this->ChatId);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->ChatId = $row['ChatId'];
        $this->EventId = $row['EventId'];
        $this->Messages = $row['Messages'];

        return $stmt;
    }

    public function readByEvent(){
        $query = "SELECT 
        chat.ChatId,
        chat.EventId as EventId,
        (SELECT count(*) from ChatMessage where chat.ChatId = ChatId) as Messages
        FROM ' . $this->table .' chat
        WHERE chat.EventId = ? 
        LEFT JOIN
            event event ON REFERENCES chat.EventId = event.EventId
        LEFT JOIN
            user user ON REFERENCES event.EventOwnerId = user.UserId
        ";
    }

    // créer un chat 
    public function create(){
        $query = " INSERT INTO " . $this->table . " 
        SET
            EventId = :EventId
        ";

        $stmt = $this->connection->prepare($query);

        $this->EventId = htmlspecialchars(strip_tags($this->EventId));

        $stmt->bindParam(':EventId', $this->EventId);

        // requete
        if($stmt->execute())
        {
            return true;
        }
        else{
            // Print Error if something goes wrong
            printf("Error: %s. \n", $stmt->error);
            return false;
        }
    }
}

?>