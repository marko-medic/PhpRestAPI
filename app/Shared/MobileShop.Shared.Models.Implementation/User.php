<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 3:49 PM
 */

namespace MobileShop\Shared\Models\Implementation;


use MobileShop\Shared\Models\Interfaces\IUser;

class User implements IUser
{
    public $name;
    public $email;
    public $id;
    public $registered;

    public function __construct(string $name, string $email, int $id = null, $registered = null)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException("Name cannot be empty");
        }

        if (empty($email)) {
            throw new \InvalidArgumentException("Email cannot be empty");
        }

        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
        $this->registered = $registered;
    }
}