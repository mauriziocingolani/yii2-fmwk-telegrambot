<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * This object represents a Telegram user or bot.
 * 
 * @property integer $id Unique identifier for this user or bot
 * @property string $first_name User‘s or bot’s first name
 * @property string $last_name User‘s or bot’s last name
 * @property string $username User‘s or bot’s username
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0.2
 * 
 * @see https://core.telegram.org/bots/api#user
 */
class User extends \yii\base\Object {

    private $_id;
    private $_first_name;
    private $_last_name;
    private $_username;
    private $_language_code;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>id</li>
     * <li>first_name</li>
     * <li>last_name (optional)</li>
     * <li>username (optional)</li>
     * <li>language_code (optional)</li>
     * </ul>
     * These names reflect the names of the private properties of this class, and their value will be assigned
     * to the corrisponding class property.
     * @param mixed $object Object with user data
     */
    public function __construct($object) {
        foreach ($object as $key => $value) :
            $k = "_$key";
            if (property_exists($this, $k))
                $this->$k = $value;
        endforeach;
    }

    /**
     * Returns the id for this user or Bot.
     * @return integer Unique identifier for this user or bot
     */
    public function getId() {
        return (int) $this->_id;
    }

    /**
     * Returns the first name of this user or Bot.
     * @return string User‘s or bot’s first name
     */
    public function getFirst_name() {
        return $this->_first_name;
    }

    /**
     * Returns the last name of this user or Bot.
     * @return string User‘s or bot’s last name
     */
    public function getLast_name() {
        return $this->_last_name;
    }

    /**
     * Returns the user name of this user or Bot.
     * @return string User‘s or bot’s user name
     */
    public function getUsername() {
        return $this->_username;
    }

}
