<?php

require_once 'RepositoryInterface.php';
require_once 'DatabaseInterface.php';
require_once 'User.php';

class UserRepository implements RepositoryInterface
{
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function getUser(string $userEmail) : User
    {
        $users = $this->getUsers();

        foreach ($users as $user){

            if (str_contains($user->describe(), $userEmail)){
                return $user;
            }
        }
        
        throw new Exception("Utilisateur avec l'email $userEmail non trouvé.");
    }

    public function getUsers() : array
    {
        $rawData = $this->database->fetchAll();

        $users = [];

        foreach ($rawData as $data){
            $users[] = new User($data['full_name'], $data['email']);
        }

        return $users;
    }
}