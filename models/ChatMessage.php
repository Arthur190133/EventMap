<?php
class Chat
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



        public function readByChat(){
            $query = "SELECT 
            chatmessage.ChatId,
            chatmessage.UserId ad UserId,
            user.UserFirstName as UserFirstName,
            user.UserAvatarId as UserAvatarId,
            user.UserName as UserName,
            image.ImageDir as UserAvatarDir,
            image.ImageName as UserAvatarName
            FROM " . $this->table ." chatmessage 
            WHERE chatmessage.ChatId = ? 
            LEFT JOIN
                user user ON REFERENCES chatmessage.UserId = user.UserId
            LEFT JOIN
                image image ON REFERENCES user.UserAvatarId = image.ImageId
            ";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(1, $this->ChatId);

            $stmt->execute();

            return $stmt;
        }


}

?>