<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * This object represents a message.
 * 
 * @property integer $message_id Unique message identifier
 * @property User $from Sender, can be empty for messages sent to channels (optional)
 * @property integer $date Date the message was sent in Unix time
 * @property Chat $chat Conversation the message belongs to
 * @property string $text For text messages, the actual UTF-8 text of the message (optional)
 * @property Document $document Message is a general file, information about the file (optional)
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 * 
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends \yii\base\Object {

    private $_message_id;
    private $_from;
    private $_date;
    private $_chat;
    private $_text;
    private $_document;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>message_id</li>
     * <li>from (optional></li>
     * <li>date</li>
     * <li>chat</li>
     * <li>text (optional)</li>
     * <li>document (optional)</li>
     * </ul>
     * @param mixed $object Object with message data
     */
    public function __construct($object) {
        $this->_message_id = (int) $object->message_id;
        if (isset($object->from))
            $this->_from = new User($object->from);
        $this->_date = (int) $object->date;
        $this->_chat = new Chat($object->chat);
        if (isset($object->document))
            $this->_document = new Document($object->document);
    }

    /**
     * Returns the message's unique identifier.
     * @return integer Unique message identifier
     */
    public function getMessage_id() {
        return $this->_message_id;
    }

    /**
     * Returns the sender (can be empty for messages sent to channels).
     * @return User Sender
     */
    public function getFrom() {
        return $this->_from;
    }

    /**
     * Returns the date the message was sent in Unix time. If the <code>format</code> parameter
     *  is set, a string (from the PHP <code>date()</code> function) will be returned instead. 
     * @return mixed Date the message was sent (in Unix time or in the required format)
     */
    public function getDate($format = null) {
        if (is_string($format))
            return date($format, $this->_date);
        return $this->_date;
    }

    /**
     * Returns the conversation the message belongs to as a <code>Chat</code> object.
     * @return Chat Conversation the message belongs to
     */
    public function getChat() {
        return $this->_chat;
    }

    /**
     * For text messages, returns the actual UTF-8 text of the message.
     * @return string For text messages, the actual UTF-8 text of the message
     */
    public function getText() {
        return $this->_text;
    }

}
