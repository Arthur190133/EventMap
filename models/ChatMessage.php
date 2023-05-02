<?php
class ChatMessage
{
    // Database
    private $connection;
    private $table = 'chatmessage';

        // propriétés du chat
        public $ChatMessageId;
        public $ChatMessageText;
        public $ChatMessageDate;
        public $UserId;
        public $ChatId;

        // user infos
        public $UserFirstName;
        public $UserName;
        public $UserAvatarId;
        public $UserAvatarDir;
        public $UserAvatarName;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }


        public function readByChat(){
            $query = "SELECT 
            chatmessage.ChatId,
            chatmessage.UserId as UserId,
            user.UserFirstName as UserFirstName,
            user.UserAvatarId as UserAvatarId,
            user.UserName as UserName,
            image.ImageDir as UserAvatarDir,
            image.ImageName as UserAvatarName
            FROM " . $this->table ." chatmessage 
            LEFT JOIN user ON chatmessage.UserId = user.UserId
            LEFT JOIN image ON user.UserAvatarId = image.ImageId
            WHERE chatmessage.ChatId = ? 
            ";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(1, $this->ChatId);

            $stmt->execute();

            

            return $stmt;
        }


}

?>