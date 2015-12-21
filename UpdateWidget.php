<?php

namespace mauriziocingolani\yii2fmwktelegrambot;

/**
 * Yii2 widget Yii2 showing the Telegram Update content.
 * @property Update $update Telegram update
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @version 1.0
 */
class UpdateWidget extends \yii\base\Widget {

    public $update;

    public function init() {
        parent::init();
    }

    public function run() {
        return $this->render('UpdateWidgetView', ['update' => $this->update]);
    }

}
