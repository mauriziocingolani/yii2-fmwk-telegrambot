<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * This object represents one size of a photo or a file/sticker thumbnail.
 * 
 * @property integer $file_size Unique identifier for this file
 * @property integer $width Photo width
 * @property integer $height Photo height
 * @property integer $file_size File size (optional)
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 * 
 * @see https://core.telegram.org/bots/api#photosize
 */
class PhotoSize extends \yii\base\Object {

    private $_file_id;
    private $_width;
    private $_height;
    private $_file_size;

    /**
     * Builds a new instance of this class, and populates the instance properties with the object
     * passed as parameter. The properties the object should have are:
     * <ul>
     * <li>file_id</li>
     * <li>width</li>
     * <li>height</li>
     * <li>file_size (optional)</li>
     * </ul>
     * These names reflect the names of the private properties of this class, and their value will be assigned
     * to the corrisponding class property.
     * @param mixed $object Object with photo size data
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
     * Reeturns the photo width.
     * @return integer Photo width
     */
    public function getWidth() {
        return (int) $this->_width;
    }

    /**
     * Returns the photo height.
     * @return integer Photo height
     */
    public function getHeight() {
        return (int) $this->_height;
    }

    /**
     * Returns the file size (if set).
     * @return integer File size
     */
    public function getFile_size() {
        return $this->_file_size ? (int) $this->_file_size : null;
    }

}
