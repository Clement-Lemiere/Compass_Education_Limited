<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture implements FixtureGroupInterface
{
    private $hasher;
    private $manager;


    public function  __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public static function getGroups(): array
    {
        return ['prod','test'];
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        $this->loadAdmins();
    }

    public function loadAdmins(): void
    {
        $datas = [
            [
                'email' => 'admin@example.com',
                'password' => '123',
                'roles' => ['admin'],
            ],
        ];
        
        foreach ($datas as $data) {
            $user = new User();
            $user->setEmail($data['email']);
            $password = $this->hasher->hashPassword($user, $data['password']);
            $user->setPassword($password);
            $user->setRoles($data['roles']);
    
            $this->manager->persist($user);
        }
        $this->manager->flush();
    }
}