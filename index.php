<?php

use taskForce\model\task;

use taskForce\exeptions\CheckTaskExeptions;

require_once 'vendor/autoload.php';

$newTask = new Task(111,222);

try {
    assert($newTask->getNextStatus('cancel') === Task::STATUS_CANCELED, 'cancel action');
    assert($newTask->getNextStatus('perfomed') === Task::STATUS_COMPLETED, 'perfomed action');
    assert($newTask->getNextStatus('respond') === Task::STATUS_PROGRESS, 'respond action');
    assert($newTask->getNextStatus('refuse') === Task::STATUS_FAILED, 'refuse action');

    assert(($newTask->getAvailableAction('new', 111)->getActionSystemName()) === 'respond', 'progress status');
    assert(($newTask->getAvailableAction('progress', 111)->getActionSystemName()) === 'refuse', 'refuse status');
    assert(($newTask->getAvailableAction('new', 222)->getActionSystemName()) === 'cancel', 'respond status');
    assert(($newTask->getAvailableAction('progress', 222)->getActionSystemName()) === 'perfomed', 'perfomed status');
} catch (CheckTaskExeptions $e) {
    echo "Error: " . $e->getMessage();
}

/*
class User {};          -> регистрация пользователя
class CreateTask {};    -> создание нового таска
class Message {};       -> отправка сообщения между заказчиком и исполнителем
class Review {};        -> завершение задачи, оценка исполнителю и отзыв о его работе
class Response {};      -> отклик на задачу
class Notification {};  -> отправка уведомлений
*/
