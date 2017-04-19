<?php

namespace UsersBundle\Service;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class Sha1Encoder implements PasswordEncoderInterface
{

    public function encodePassword($raw, $salt)
    {
        return hash('sha1', $raw); // Custom function for password encrypt
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded === $this->encodePassword($raw, $salt);
    }

}