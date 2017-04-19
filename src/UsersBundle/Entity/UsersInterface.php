<?php

namespace UsersBundle\Entity;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface as SecurityUserInterface;

interface UsersInterface extends SecurityUserInterface
{
    public function encodePassword(PasswordEncoderInterface $encoder);
}