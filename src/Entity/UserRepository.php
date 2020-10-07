<?php

namespace app\src\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;


class UserRepository extends EntityRepository
{
/*
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUserList(){

        $this->getRepository();
        /*
        $conn = $this->entityManager->getConnection();
        $sql  = "SELECT id, name
                 FROM User";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $userList = $stmt->fetchAll();
        $conn->close();
        return $userList;
    }

    public function saveNewUser($name){
        $conn = $this->entityManager->getConnection();
        $sql  = "INSERT name=$name
                 INTO User";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $userList = $this->getUserList();
        $conn->close();
        return $userList;
    }
*/
}