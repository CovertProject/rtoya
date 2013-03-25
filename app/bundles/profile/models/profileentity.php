<?php

namespace Profile;

use Base\Entity\Entity;
use \Hash;

class ProfileEntity extends Entity {
    protected $id = null;
    protected $username = null;
    protected $email = null;
    protected $password = null;
    protected $full_name = null;
    protected $website = null;
    protected $bio = null;
    private $fields = array();

    const FLD_id = 'id';
    const FLD_username = 'username';
    const FLD_email = 'email';
    const FLD_password = 'password';
    const FLD_full_name = 'full_name';
    const FLD_website = 'website';
    const FLD_bio = 'bio';

    public function __construct($id, $hydrate = false)
    {
        $this->id = $id;
        $this->fields = array(
            self::FLD_id,
            self::FLD_username,
            self::FLD_email,
            self::FLD_password,
            self::FLD_full_name,
            self::FLD_website,
            self::FLD_bio,
        );

        if ($hydrate === true) {
            $this->hydrate();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = Hash::make($password);
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        if ( ! preg_match('/https?:\/\//', $website))
            $website = 'http://'.$website;

        $this->website = $website;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function hydrate()
    {
        $profile = ProfileRepository::get_profile($this->id);

        $this->setUsername($profile['username']);
        $this->setEmail($profile['email']);
        $this->setPassword($profile['password']);
        $this->setFullName($profile['full_name']);
        $this->setWebsite($profile['website']);
        $this->setBio($profile['bio']);
    }

    public function fieldsAsArray($includeId = false, $includeNull = false)
    {
        if ($includeId)
            $output[self::FLD_id] = $this->getId();

        $output[self::FLD_username] = $this->getUsername();
        if ( ! $includeNull && is_null($output[self::FLD_username]))
            unset($output[self::FLD_username]);

        $output[self::FLD_email] = $this->getEmail();
        if ( ! $includeNull && is_null($output[self::FLD_email]))
            unset($output[self::FLD_email]);

        $output[self::FLD_password] = $this->getPassword();
        if ( ! $includeNull && is_null($output[self::FLD_password]))
            unset($output[self::FLD_password]);

        $output[self::FLD_full_name] = $this->getFullName();
        if ( ! $includeNull && is_null($output[self::FLD_full_name]))
            unset($output[self::FLD_full_name]);

        $output[self::FLD_website] = $this->getWebsite();
        if ( ! $includeNull && is_null($output[self::FLD_website]))
            unset($output[self::FLD_website]);

        $output[self::FLD_bio] = $this->getBio();
        if ( ! $includeNull && is_null($output[self::FLD_bio]))
            unset($output[self::FLD_bio]);

        return $output;
    }
}
