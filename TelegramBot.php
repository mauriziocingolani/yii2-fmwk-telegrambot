<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

use yii\base\InvalidConfigException;

/**
 * Componente per l'interazione con il Telegram Bot relativo all'applicazione.
 * Richiede l'inizializzazione in fase di configurazione dei seguenti parametri:
 * <ul>
 * <li>$token: Token del Bot</li>
 * </ul>
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 */
class TelegramBot extends \yii\base\Component {

    const URL = 'https://api.telegram.org/bot';

    public $token;

    /**
     * Inizializza il componente e verifica che i parametri siano stati impostati.
     * @throws InvalidConfigException
     */
    public function init() {
        parent::init();
        if (!$this->token)
            throw new InvalidConfigException('Componente Telegram Bot: parametri di configurazione mancanti.');
    }

    public function getMe() {
        return file_get_contents(self::URL . $this->token . '/getMe');
    }

}
