<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    private $hasher;
    private $manager;
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
                'roles' => ['ROLE_ADMIN'],
                'enabled' => true,
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
