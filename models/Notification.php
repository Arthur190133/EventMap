<?php

class Notification{
    // Database
    private $connection;
    private $table = 'user';

    // propriétés des notifications
    public $NotificationId;
    public $NotificationSender;
    public $NotificationContext;
    public $NotificationStatus;
    public $UserId;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // récuperer toutes les notifications
    public function readAll()
    {
        
    }
}

?>