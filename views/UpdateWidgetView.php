<?php

use mauriziocingolani\yii2fmwktelegrambot\Update;
use mauriziocingolani\yii2fmwkphp\Html;

/* @var $update Update */
/* @version 1.0 */
$message = $update->message;
?>

<div class="telegram">
    <header>
        <i class="fa fa-paper-plane"></i>
        <span>
            <?= date('d-m-Y', strtotime($message->getDate('d-m-Y'))); ?> 
            alle
            <?php
            $dt = new DateTime('@' . $message->date);
            $dt->setTimezone(new DateTimeZone('Europe/Rome'));
            echo $dt->format('H:i');
            ?>
            <?=
            Html::a('<i class="fa fa-trash-o"></i>', ['/site/telegram-updates/' . $update->update_id], [
                'title' => 'Clicca per confermare la lettura di questa notifica e delle precedenti',
                'onclick' => 'return confirm("Sei sicuro? Questa notifica e tutte quelle precedenti non compariranno più in questa lista...");',
            ]);
            ?>
        </span>
    </header>
    <p>
        <?php
        if ($message->text) :
            echo Html::encode($message->text);
        elseif (isset($message->photo)) :
            $ps = $message->photo[count($message->photo) - 1];
            $file = Yii::$app->telegram->getFile($ps->file_id);
            echo Html::img($file->fileUrl, ['class' => 'img-thumbnail', 'style' => 'max-width: 200px;']);
        elseif (isset($message->document)) :
            $img = Yii::$app->telegram->getFile($message->document->thumb->file_id);
            $file = Yii::$app->telegram->getFile($message->document->file_id);
            echo Html::a(Html::img($img->fileUrl, ['class' => 'img-thumbnail', 'style' => 'max-width: 200px;']), $file->fileUrl);
            echo '<br />';
            echo Html::a($message->document->file_name, $file->fileUrl);
        endif;
        ?>
    </p>
</div>  