<?php

namespace App\Models;

class User extends \App\Models\WSAdapter
{
    private $_name,
        $_first_name,
        $_company,
        $_phone,
        $_address,
        $_address2,
        $_postal,
        $_city,
        $_country,
        $_information,
        $_email,
        $_comment,
        $_age,
        $_weight,
        $_height,
        $_neck,
        $_chest,
        $_belt,
        $_shoulders,
        $_back,
        $_wrists,
        $_arms;

    /**
     * User constructor.
     * @param $_name
     * @param $_first_name
     * @param $_company
     * @param $_phone
     * @param $_address
     * @param $_address2
     * @param $_postal
     * @param $_city
     * @param $_country
     * @param $_information
     * @param $_email
     * @param $_comment
     * @param $_age
     * @param $_weight
     * @param $_height
     * @param $_neck
     * @param $_chest
     * @param $_belt
     * @param $_shoulders
     * @param $_back
     * @param $_wrists
     * @param $_arms
     */
    public function __construct($_name = null, $_first_name = null, $_company = null, $_phone = null, $_address = null,
                                $_address2 = null, $_postal = null, $_city = null, $_country = null, $_information = null, $_email = null,
                                $_comment = null, $_age = null, $_weight = null, $_height = null, $_neck = null,
                                $_chest = null, $_belt = null, $_shoulders = null, $_back = null, $_wrists = null, $_arms = null)
    {
        parent::__construct();
        $this->_name = $_name;
        $this->_first_name = $_first_name;
        $this->_company = $_company;
        $this->_phone = $_phone;
        $this->_address = $_address;
        $this->_address2 = $_address2;
        $this->_postal = $_postal;
        $this->_city = $_city;
        $this->_country = $_country;
        $this->_information = $_information;
        $this->_email = $_email;
        $this->_comment = $_comment;
        $this->_age = $_age;
        $this->_weight = $_weight;
        $this->_height = $_height;
        $this->_neck = $_neck;
        $this->_chest = $_chest;
        $this->_belt = $_belt;
        $this->_shoulders = $_shoulders;
        $this->_back = $_back;
        $this->_wrists = $_wrists;
        $this->_arms = $_arms;
    }

    public  function findById($id)
    {
        return parent::findById($id);
    }

    public function save()
    {
        $this->createCustomer();
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param null $name
     * @return User
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->_first_name;
    }

    /**
     * @param null $first_name
     * @return User
     */
    public function setFirstName($first_name)
    {
        $this->_first_name = $first_name;
        return $this;
    }

    /**
     * @return null
     */
    public function getCompany()
    {
        return $this->_company;
    }

    /**
     * @param null $company
     * @return User
     */
    public function setCompany($company)
    {
        $this->_company = $company;
        return $this;
    }

    /**
     * @return null
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param null $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
        return $this;
    }

    /**
     * @return null
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param null $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->_address = $address;
        return $this;
    }

    /**
     * @return null
     */
    public function getAddress2()
    {
        return $this->_address2;
    }

    /**
     * @param null $address2
     * @return User
     */
    public function setAddress2($address2)
    {
        $this->_address2 = $address2;
        return $this;
    }

    /**
     * @return null
     */
    public function getPostal()
    {
        return $this->_postal;
    }

    /**
     * @param null $postal
     * @return User
     */
    public function setPostal($postal)
    {
        $this->_postal = $postal;
        return $this;
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param null $city
     * @return User
     */
    public function setCity($city)
    {
        $this->_city = $city;
        return $this;
    }

    /**
     * @return null
     */
    public function getInformation()
    {
        return $this->_information;
    }

    /**
     * @param null $information
     * @return User
     */
    public function setInformation($information)
    {
        $this->_information = $information;
        return $this;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param null $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }

    /**
     * @return null
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @param null $comment
     * @return User
     */
    public function setComment($comment)
    {
        $this->_comment = $comment;
        return $this;
    }

    /**
     * @return null
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param null $age
     * @return User
     */
    public function setAge($age)
    {
        $this->_age = $age;
        return $this;
    }

    /**
     * @return null
     */
    public function getWeight()
    {
        return $this->_weight;
    }

    /**
     * @param null $weight
     * @return User
     */
    public function setWeight($weight)
    {
        $this->_weight = $weight;
        return $this;
    }

    /**
     * @return null
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param null $height
     * @return User
     */
    public function setHeight($height)
    {
        $this->_height = $height;
        return $this;
    }

    /**
     * @return null
     */
    public function getNeck()
    {
        return $this->_neck;
    }

    /**
     * @param null $neck
     * @return User
     */
    public function setNeck($neck)
    {
        $this->_neck = $neck;
        return $this;
    }

    /**
     * @return null
     */
    public function getChest()
    {
        return $this->_chest;
    }

    /**
     * @param null $chest
     * @return User
     */
    public function setChest($chest)
    {
        $this->_chest = $chest;
        return $this;
    }

    /**
     * @return null
     */
    public function getBelt()
    {
        return $this->_belt;
    }

    /**
     * @param null $belt
     * @return User
     */
    public function setBelt($belt)
    {
        $this->_belt = $belt;
        return $this;
    }

    /**
     * @return null
     */
    public function getShoulders()
    {
        return $this->_shoulders;
    }

    /**
     * @param null $shoulders
     * @return User
     */
    public function setShoulders($shoulders)
    {
        $this->_shoulders = $shoulders;
        return $this;
    }

    /**
     * @return null
     */
    public function getBack()
    {
        return $this->_back;
    }

    /**
     * @param null $back
     * @return User
     */
    public function setBack($back)
    {
        $this->_back = $back;
        return $this;
    }

    /**
     * @return null
     */
    public function getWrists()
    {
        return $this->_wrists;
    }

    /**
     * @param null $wrists
     * @return User
     */
    public function setWrists($wrists)
    {
        $this->_wrists = $wrists;
        return $this;
    }

    /**
     * @return null
     */
    public function getArms()
    {
        return $this->_arms;
    }

    /**
     * @param null $arms
     * @return User
     */
    public function setArms($arms)
    {
        $this->_arms = $arms;
        return $this;
    }





}