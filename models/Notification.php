<?php

class Notification{
    // Database
    private $connection;
    private $table = 'notification';

    // propriétés des notifications
    public $NotificationId;
    public $NotificationSender;
    public $NotificationContext;
    public $NotificationStatus;
    public $NotificationDate;
    public $UserId;
    public $UserName;
    public $UserLastName;
    public $UserAvatarDir;
    public $UserAvatarName;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // récuperer toutes les notifications
    public function readAll()
    {
        $query = 'SELECT
        notification.NotificationId,
        notification.NotificationSender,
        notification.NotificationContext,
        notification.NotificationStatus,
        notification.NotificationDate,
        notification.UserId,
        user.UserName as UserName,
        user.UserFirstName as UserFirstName,
        image.ImageDir as UserAvatarDir,
        image.ImageDir as UserAvatarName
        FROM ' . $this->table .' notification 
        LEFT JOIN user user ON notification.UserId = user.UserId
        LEFT JOIN image image ON user.UserAvatarId = image.ImageId
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}

?>