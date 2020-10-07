<?php

namespace app\controllers;
use app\core\Application;
use app\src\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController{

    public function home(){
        return Application::$app->router->renderView('home');
    }

    public function users(EntityManager $entityManager){
        $user = new User();
 /*       $user->setName('Vlada');
        $user->setEmail('rokerstari@gmail.com');

        $entityManager->persist($user);
        $entityManager->flush();
*/
        $getUserList = $entityManager->getRepository(User::class)->findAll();
     /*   var_dump($getUserList);
        exit;*/
        return Application::$app->router->renderView('users',$getUserList);

    }

    public function saveUsers(EntityManager $entityManager, Request $request){
        $post = $request->request->all();
        $user = new User(); 

        $user->setName($post['username']);
        $user->setEmail($post['email']);

        $entityManager->persist($user);
        $entityManager->flush();

        $getUserList = $entityManager->getRepository(User::class)->findAll();

        return Application::$app->router->renderView('users',$getUserList);

    }

    public function ships(){
        return Application::$app->router->renderView('ships');
    }

    public function crewmembers(){
        return Application::$app->router->renderView('crewmembers');
    }

    public function ranks(){
        return Application::$app->router->renderView('ranks');
    }

    public function notifications(){
        return Application::$app->router->renderView('notifications');
    }
}



?>