<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * This object represents a chat.
 * 
 * @property integer $id Unique identifier for this chat (not exceeding 1e13 by absolute value)
 * @property string $type Type of chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property string $title Title, for channels and group chats (optional)
 * @property string $username Username, for private chats and channels if available (optional)
 * @property string $first_name First name of the other party in a private chat (optional)
 * @property string $last_name Last name of the other party in a private chat (optional)
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.1
 * 
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends \yii\base\BaseObject {

    private $_id;
    private $_type;
    private $_title;
    private $_username;
    private $_first_name;
    private $_last_name;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>id</li>
     * <li>type</li>
     * <li>title (optional></li>
     * <li>username (optional)</li>
     * <li>first_name (optional)</li>
     * <li>last_name (optional)</li>
     * </ul>
     * These names reflect the names of the private properties of this class, and their value will be assigned
     * to the corrisponding class property.
     * @param mixed $object Object with chat data
     */
    public function __construct($object) {
        foreach ($object as $key => $value) :
            $k = "_$key";
            $this->$k = $value;
        endforeach;
    }

    /**
     * Returns the unique identifier for this chat (not exceeding 1e13 by absolute value).
     * @return integer Unique identifier for this chat
     */
    public function getId() {
        return (int) $this->_id;
    }

    /**
     * Returns the type of chat. Can be either “private”, “group”, “supergroup” or “channel”
     * @return string Type of chat
     */
    public function getType() {
        return $this->_type;
    }

    /**
     * Returns the title, for channels and group chats.
     * @return string Title, for channels and group chats (optional)
     */
    public function getTitle() {
        return $this->_title;
    }

    /**
     * Returns the username, for private chats and channels if available.
     * @return string Username, for private chats and channels if available (optional)
     */
    public function getUsername() {
        return $this->_username;
    }

    /**
     * Returns the first name of the other party in a private chat.
     * @return string First name of the other party in a private chat (optional)
     */
    public function getFirst_name() {
        return $this->_first_name;
    }

    /**
     * Returns the last name of the other party in a private chat.
     * @return string Last name of the other party in a private chat (optional)
     */
    public function getLast_name() {
        return $this->_last_name;
    }

}
