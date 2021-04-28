<?php


namespace taskForce\model\actions;


class PerfomedAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName(): string
    {
        return "Выполнено";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName(): string
    {
        return "perfomed";
    }

    /**
     * Проверяет права пользователя для этого действия
     */
    function userRoleCheck(int $clientId, int $executorId, int $currentUser): bool
    {
        if ($currentUser === $clientId) {
            return true;
        }

        return false;
    }
}
