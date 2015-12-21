<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

use Yii;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link 
 * <code>https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;. It is guaranteed that the link 
 * will be valid for at least 1 hour. When the link expires, a new one can be requested by calling <code>getFile</code>.
 * 
 * @property string $file_id Unique identifier for this file
 * @property integer $file_size File size, if known (optional) 
 * @property string $file_path File path (optional)
 * 
 * @property string $fileUrl URL the file can be downloaded from
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 * 
 * @see https://core.telegram.org/bots/api#file
 */
class File extends \yii\base\Object {

    private $_file_id;
    private $_file_size;
    private $_file_path;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>file_id</li>
     * <li>file_size (optional)</li>
     * <li>file_path (optional)</li>
     * </ul>
     * These names reflect the names of the private properties of this class, and their value will be assigned
     * to the corrisponding class property.
     * @param mixed $object Object with file data
     */
    public function __construct($object) {
        foreach ($object as $key => $value) :
            $k = "_$key";
            $this->$k = $value;
        endforeach;
    }

    /**
     * Returns the unique identifier for this file
     * @return integer Unique identifier for this file
     */
    public function getFile_id() {
        return (int) $this->_file_id;
    }

    /**
     * Returns the file size, if known.
     * @return integer File size, if known
     */
    public function getFile_size() {
        return $this->_file_size ? (int) $this->_file_size : null;
    }

    /**
     * Returns the file path. Use <code>https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;</code> to get the file.
     * @return integer File path
     */
    public function getFile_path() {
        return $this->_file_path ? $this->_file_path : null;
    }

    /**
     * Returns the URL for the file to be downloaded: <code>https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;</code>.
     * You can either pass the token as a parameter, or use the Telegram component $token property.
     * @param string $token Telegram Bot token (optional)
     * @return string File URL the file can be downloaded from
     * @throws yii\base\InvalidConfigException When the $token property of the Telegram component is missing.
     */
    public function getFileUrl($token = null) {
        if (!$token) :
            $token = Yii::$app->telegram->token;
            if (!$token)
                throw new yii\base\InvalidConfigException(__METHOD__ . ': $token parameter missing in Telegram component configuration.');
        endif;
        return TelegramBot::FILE_URL . $token . '/' . $this->_file_path;
    }

}
