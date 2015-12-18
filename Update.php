<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * This object represents an incoming update.
 * 
 * @property integer $update_id The update‘s unique identifier
 * @property Message $message New incoming message of any kind — text, photo, sticker, etc.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 * 
 * @see https://core.telegram.org/bots/api#update
 */
class Update extends \yii\base\Object {

    private $_update_id;
    private $_message;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>id</li>
     * <li>message</li>
     * </ul>
     * Objects like that are usually returned by a <code>getUpdates</code> call.
     * @param mixed $object Object with update data
     */
    public function __construct($object) {
        $this->_update_id = (int) $object->update_id;
        $this->_message = new Message($object->message);
    }

    /**
     * Returns the id for this update.
     * @return integer The update‘s unique identifier
     */
    public function getUpdate_Id() {
        return (int) $this->_update_id;
    }

    /**
     * Returns the new incoming message of any kind — text, photo, sticker, etc.
     * @return Message New incoming message
     */
    public function getMessage() {
        return $this->_message;
    }

}
