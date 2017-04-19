<?php

namespace UsersBundle\DataFixtures\ORM;

use UsersBundle\Entity\Users;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadFixtures implements FixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
    }

    private function loadUsers(ObjectManager $manager)
    {
        $user = new Users();
        $user->setUsername('user1');
        $user->setEmail('user1@symfony.com');
        $user->setPlainPassword('pass');
        $user->setIsActive(true);

        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $user->encodePassword($encoder);

        $manager->persist($user);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}