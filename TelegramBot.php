<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

use yii\base\InvalidConfigException;

/**
 * This component handles the communication with the Telegram Bot associated
 * with an application.
 * <ul>
 * <li>$token: Token del Bot</li>
 * </ul>
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0.4
 */
class TelegramBot extends \yii\base\Component {

    const URL = 'https://api.telegram.org/bot';
    const FILE_URL = 'https://api.telegram.org/file/bot';

    public $token;
    public $id;

    /**
     * Initialize the component, checking whether the $token property has been set.
     * @throws InvalidConfigException If the $token property hasn't been set
     */
    public function init() {
        parent::init();
        if (!$this->token)
            throw new InvalidConfigException('Telegram Bot component: configuration parameter $token missing.');
    }

    /**
     * A simple method for testing your bot's auth token. Requires no parameters.
     * Returns basic information about the bot in form of a <code>User</code> object.
     * @return \mauriziocingolani\yii2fmwktelegrambot\User <code>User</code> object with basic Bot informations
     * @throws \yii\web\HttpException If something went wrong
     */
    public function getMe() {
        $response = json_decode(file_get_contents(self::URL . $this->token . '/getMe'));
        if ($response->ok === true)
            return new User($response->result);
        throw new \yii\web\HttpException(400, __METHOD__ . ': something went wrong with the Telegram Bot.');
    }

    /**
     * Use this method to receive incoming updates using long polling (wiki).
     * If set, <code>offset</code> be greater by one than the highest among the identifiers of previously 
     * received updates. By default, updates starting with the earliest unconfirmed update are returned. 
     * An update is considered confirmed as soon as <code>getUpdates</code> is called with an <code>offset</code>
     * higher than its <code>update_id</code>.
     * An array of <code>Update</code> objects is returned.
     * @param integer $offset Identifier of the first update to be returned
     * @param integer $limit Limits the number of updates to be retrieved (1 to 100, default 100)
     * @param type $timeout Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling
     * @return \mauriziocingolani\yii2fmwktelegrambot\Update
     * @throws \yii\web\HttpException If something went wrong
     */
    public function getUpdates($offset = null, $limit = 100, $timeout = 0) {
        $url = self::URL . $this->token . '/getUpdates?limit=' . (int) $limit;
        if ($offset)
            $url .= '&offset=' . (int) $offset;
        if ($timeout > 0)
            $url .= '&timeout=' . (int) $timeout;
        $response = json_decode(file_get_contents($url));
        if ($response->ok === true) :
            $data = [];
            foreach ($response->result as $update) :
                $data[] = new Update($update);
            endforeach;
            return $data;
        endif;
        throw new \yii\web\HttpException(400, __METHOD__ . ': something went wrong with the Telegram Bot.');
    }

    /**
     * Use this method to send text messages. On success, the sent <code>Message</code> is returned.
     * @param type $chat_id Unique identifier for the target chat or username of the target channel
     * @param type $text Text of the message to be sent
     * @return \mauriziocingolani\yii2fmwktelegrambot\Message Sent message
     * @throws \yii\web\HttpException If something went wrong
     */
    public function sendMessage($chat_id, $text) {
        $response = json_decode(file_get_contents(self::URL . $this->token . '/sendMessage?chat_id=' . (int) $chat_id . '&text=' . $text));
        if ($response->ok == true)
            return new Message($response->result);
        throw new \yii\web\HttpException(400, __METHOD__ . ': something went wrong with the Telegram Bot.');
    }

    /**
     * Use this method to get basic info about a file and prepare it for downloading. 
     * For the moment, bots can download files of up to 20MB in size. On success, 
     * a <code>File</code> object is returned. The file can then be downloaded via the
     * link <code>https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;</code>, 
     * where <code>&lt;file_path&gt;</code> is taken from the response. It is guaranteed
     *  that the link will be valid for at least 1 hour. When the link expires, a new one can be 
     * requested by calling <code>getFile</code> again.
     * @param string $file_id File identifier to get info about
     * @return \mauriziocingolani\yii2fmwktelegrambot\File <code>File</code> object with info
     * @throws \yii\web\HttpException If something went wrong
     */
    public function getFile($file_id) {
        $response = json_decode(file_get_contents(self::URL . $this->token . '/getFile?file_id=' . $file_id));
        if ($response->ok == true)
            return new File($response->result);
        throw new \yii\web\HttpException(400, __METHOD__ . ': something went wrong with the Telegram Bot.');
    }

}
