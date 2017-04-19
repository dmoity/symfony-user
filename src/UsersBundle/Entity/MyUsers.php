<?php

namespace UsersBundle\Entity;

use UsersBundle\Entity\UsersInterface;
use Doctrine\ORM\Mapping as ORM;
//use Serializable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MyUsers
 *
 * @ORM\Table(name="my_users")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\UsersRepository")
 * @UniqueEntity(fields="login", message="That login is taken!")
 */
class MyUsers implements UsersInterface//, Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64)
     * @Assert\NotBlank(message="Give us at least 3 characters")
     * @Assert\Length(min=3, minMessage="Give us at least 3 characters!")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=64)
     * @Assert\NotBlank(message="Give us at least 3 characters")
     * @Assert\Length(min=3, minMessage="Give us at least 3 characters!")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=20)
     * @Assert\NotBlank(message="Give us at least 3 characters")
     * @Assert\Length(min=3, minMessage="Give us at least 3 characters!")
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_mobile", type="string", length=20)
     */
    private $phoneMobile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="account_begin", type="datetime")
     * @Assert\DateTime
     */
    private $accountBegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="account_end", type="datetime")
     * @Assert\DateTime
     */
    private $accountEnd;

    /**
     * @var boolean
     *
     * @ORM\Column(name="password_attempt", type="smallint")
     * @Assert\LessThanOrEqual(3)
     */
    private $passwordAttempt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="can_modify_metadata", type="boolean")
     */
    private $canModifyMetadata;

    /**
     * @var boolean
     *
     * @ORM\Column(name="can_import", type="boolean")
     */
    private $canImport;

    /**
     * @var boolean
     *
     * @ORM\Column(name="can_modify_metadata_document", type="boolean")
     */
    private $canModifyMetadataDocument;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $isAdmin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="can_validate_doc", type="boolean")
     */
    private $canValidateDoc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="dongle_key", type="string", length=50)
     */
    private $dongleKey;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=256)
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="context_crypt", type="string", length=256)
     */
    private $contextCrypt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="can_modify_model", type="boolean")
     */
    private $canModifyModel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="can_see_all_model", type="boolean")
     */
    private $canSeeAllModel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_validate_changelog", type="boolean")
     */
    private $isValidateChangelog;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @Assert\NotBlank
     * @Assert\Regex(
     *      pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/",
     *      message="Use 1 upper case letter, 1 lower case letter, and 1 number"
     * )
     */
    private $plainPassword;

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MyUsers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return MyUsers
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return MyUsers
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return MyUsers
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return MyUsers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return MyUsers
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phoneMobile
     *
     * @param string $phoneMobile
     *
     * @return MyUsers
     */
    public function setPhoneMobile($phoneMobile)
    {
        $this->phoneMobile = $phoneMobile;

        return $this;
    }

    /**
     * Get phoneMobile
     *
     * @return string
     */
    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

    /**
     * Set accountBegin
     *
     * @param \DateTime $accountBegin
     *
     * @return MyUsers
     */
    public function setAccountBegin($accountBegin)
    {
        $this->accountBegin = $accountBegin;

        return $this;
    }

    /**
     * Get accountBegin
     *
     * @return \DateTime
     */
    public function getAccountBegin()
    {
        return $this->accountBegin;
    }

    /**
     * Set accountEnd
     *
     * @param \DateTime $accountEnd
     *
     * @return MyUsers
     */
    public function setAccountEnd($accountEnd)
    {
        $this->accountEnd = $accountEnd;

        return $this;
    }

    /**
     * Get accountEnd
     *
     * @return \DateTime
     */
    public function getAccountEnd()
    {
        return $this->accountEnd;
    }

    /**
     * Set passwordAttempt
     *
     * @param boolean $passwordAttempt
     *
     * @return MyUsers
     */
    public function setPasswordAttempt($passwordAttempt)
    {
        $this->passwordAttempt = $passwordAttempt;

        return $this;
    }

    /**
     * Get passwordAttempt
     *
     * @return boolean
     */
    public function getPasswordAttempt()
    {
        return $this->passwordAttempt;
    }

    /**
     * Set canModifyMetadata
     *
     * @param boolean $canModifyMetadata
     *
     * @return MyUsers
     */
    public function setCanModifyMetadata($canModifyMetadata)
    {
        $this->canModifyMetadata = $canModifyMetadata;

        return $this;
    }

    /**
     * Get canModifyMetadata
     *
     * @return boolean
     */
    public function getCanModifyMetadata()
    {
        return $this->canModifyMetadata;
    }

    /**
     * Set canImport
     *
     * @param boolean $canImport
     *
     * @return MyUsers
     */
    public function setCanImport($canImport)
    {
        $this->canImport = $canImport;

        return $this;
    }

    /**
     * Get canImport
     *
     * @return boolean
     */
    public function getCanImport()
    {
        return $this->canImport;
    }

    /**
     * Set canModifyMetadataDocument
     *
     * @param boolean $canModifyMetadataDocument
     *
     * @return MyUsers
     */
    public function setCanModifyMetadataDocument($canModifyMetadataDocument)
    {
        $this->canModifyMetadataDocument = $canModifyMetadataDocument;

        return $this;
    }

    /**
     * Get canModifyMetadataDocument
     *
     * @return boolean
     */
    public function getCanModifyMetadataDocument()
    {
        return $this->canModifyMetadataDocument;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     *
     * @return MyUsers
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set canValidateDoc
     *
     * @param boolean $canValidateDoc
     *
     * @return MyUsers
     */
    public function setCanValidateDoc($canValidateDoc)
    {
        $this->canValidateDoc = $canValidateDoc;

        return $this;
    }

    /**
     * Get canValidateDoc
     *
     * @return boolean
     */
    public function getCanValidateDoc()
    {
        return $this->canValidateDoc;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return MyUsers
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set dongleKey
     *
     * @param string $dongleKey
     *
     * @return MyUsers
     */
    public function setDongleKey($dongleKey)
    {
        $this->dongleKey = $dongleKey;

        return $this;
    }

    /**
     * Get dongleKey
     *
     * @return string
     */
    public function getDongleKey()
    {
        return $this->dongleKey;
    }

    /**
     * Set context
     *
     * @param string $context
     *
     * @return MyUsers
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set contextCrypt
     *
     * @param string $contextCrypt
     *
     * @return MyUsers
     */
    public function setContextCrypt($contextCrypt)
    {
        $this->contextCrypt = $contextCrypt;

        return $this;
    }

    /**
     * Get contextCrypt
     *
     * @return string
     */
    public function getContextCrypt()
    {
        return $this->contextCrypt;
    }

    /**
     * Set canModifyModel
     *
     * @param boolean $canModifyModel
     *
     * @return MyUsers
     */
    public function setCanModifyModel($canModifyModel)
    {
        $this->canModifyModel = $canModifyModel;

        return $this;
    }

    /**
     * Get canModifyModel
     *
     * @return boolean
     */
    public function getCanModifyModel()
    {
        return $this->canModifyModel;
    }

    /**
     * Set canSeeAllModel
     *
     * @param boolean $canSeeAllModel
     *
     * @return MyUsers
     */
    public function setCanSeeAllModel($canSeeAllModel)
    {
        $this->canSeeAllModel = $canSeeAllModel;

        return $this;
    }

    /**
     * Get canSeeAllModel
     *
     * @return boolean
     */
    public function getCanSeeAllModel()
    {
        return $this->canSeeAllModel;
    }

    /**
     * Set isValidateChangelog
     *
     * @param boolean $isValidateChangelog
     *
     * @return MyUsers
     */
    public function setIsValidateChangelog($isValidateChangelog)
    {
        $this->isValidateChangelog = $isValidateChangelog;

        return $this;
    }

    /**
     * Get isValidateChangelog
     *
     * @return boolean
     */
    public function getIsValidateChangelog()
    {
        return $this->isValidateChangelog;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return MyUsers
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return MyUsers
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return MyUsers
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        if ($this->plainPassword) {
            //$this->salt = sha1(uniqid(mt_rand()));
            $this->salt = "";
            $this->password = $encoder->encodePassword(
                $this->plainPassword,
                $this->salt
            );

            $this->eraseCredentials();
        }
    }

    public function eraseCredentials()
    {
        $this->setPlainPassword(null);
    }

    public function getUsername(): string
    {
        return $this->login;
    }

    public function isAccountNonExpired(): bool
    {
        return true;
    }

    public function isAccountNonLocked(): bool
    {
        return true;
    }

    public function isCredentialsNonExpired(): bool
    {
        return true;
    }

    public function isEnabled(): bool
    {
        return $this->isActive;
    }

    /*public function serialize(): string
    {
        return serialize(array(
            $this->idUser,
            $this->login,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->idUser,
            $this->login,
            $this->password,
        ) = unserialize($serialized);
    }*/

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

}
