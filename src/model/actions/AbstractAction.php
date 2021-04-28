<?php

namespace taskForce\model\actions;

abstract class AbstractAction {

    /**
     * Возвращает название
     */
    abstract function getActionName();

    /**
     * Возвращает внутреннее название
     */
    abstract function getActionSystemName();

    /**
     * Проверяет права пользователя для текущего действия
     */
    abstract function userRoleCheck(int $clientId, int $executorId, int $currentUser);
}
