<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 * 
 * @property string $file_id Unique file identifier
 * @property PhotoSize $thumb Document thumbnail as defined by sender (optional)
 * @property string $file_name Original filename as defined by sender (optional)
 * @property string mime_type MIME type of the file as defined by sender (optional)
 * @property integer file_size File size (optional)
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 * 
 * @see https://core.telegram.org/bots/api#photosize
 */
class Document extends \yii\base\Object {

    private $_file_id;
    private $_thumb;
    private $_file_name;
    private $_mime_type;
    private $_file_size;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>file_id</li>
     * <li>thumb (optional)</li>
     * <li>file_name (optional)</li>
     * <li>mime_type (optional)</li>
     * <li>file_size (optional)</li>
     * </ul>
     * @param mixed $object Object with document data
     */
    public function __construct($object) {
        $this->_file_id = $object->file_id;
        if (isset($object->thumb))
            $this->_thumb = new PhotoSize($object->thumb);
        if (isset($object->file_name))
            $this->_file_name = $object->file_name;
        if (isset($object->mime_type))
            $this->_mime_type = $object->mime_type;
        if (isset($object->file_size))
            $this->_file_size = (int) $object->file_size;
    }

    /**
     * Returns the unique file identifier.
     * @return string Unique file identifier
     */
    public function getFile_id() {
        return $this->_file_id;
    }

    /**
     * Returns the document thumbnail as defined by sender (if set) as a <code>PhotoSize</code> object.
     * @return PhotoSize Document thumbnail as defined by sender (optional)
     */
    public function getThumb() {
        return $this->_thumb ? $this->_thumb : null;
    }

    /**
     * Returns the original filename as defined by sender (if set).
     * @return string Original filename as defined by sender (optional)
     */
    public function getFile_name() {
        return $this->_file_name ? $this->_file_name : null;
    }

    /**
     * Returns the original filename as defined by sender (if set).
     * @return string MIME type of the file as defined by sender (optional)
     */
    public function getMime_type() {
        return $this->_file_name ? $this->_file_name : null;
    }

    /**
     * Returns the file size (if set).
     * @return integer File size (optional)
     */
    public function getFile_size() {
        return $this->_file_size ? $this->_file_size : null;
    }

}
