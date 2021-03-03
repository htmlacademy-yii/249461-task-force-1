<?php

use taskForce\model\task;

require_once 'vendor/autoload.php';

$newTask = new Task(111,222);

assert($newTask->getNextStatus('cancel') === Task::STATUS_CANCELED, 'cancel action');
assert($newTask->getNextStatus('perfomed') === Task::STATUS_COMPLETED, 'perfomed action');
assert($newTask->getNextStatus('respond') === Task::STATUS_PROGRESS, 'respond action');
assert($newTask->getNextStatus('refuse') === Task::STATUS_FAILED, 'refuse action');

assert($newTask->getAvailableAction('new', 111) === Task::ACTION_RESPOND, 'progress status');
assert($newTask->getAvailableAction('progress', 111) === Task::ACTION_REFUSE, 'refuse status');
assert($newTask->getAvailableAction('new', 222) === Task::ACTION_CANCEL, 'respond status');
assert($newTask->getAvailableAction('progress', 222) === Task::ACTION_PERFOMED, 'perfomed status');
