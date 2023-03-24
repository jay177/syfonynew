<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ){

    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@mail.com');
            $user->setFirstName('User' . $i);
            $user->setLastName('LastName');
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, 'password')
            );

            if ($i === 1) {
                $user->setRoles(['ROLE_ADMIN']);
            }
            $manager->persist($user);

        }
        $manager->flush();
    }
}
