<?php


namespace taskForce\model\actions;


class CanceledAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName(): string
    {
        return "Отменить";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName(): string
    {
        return "cancel";
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
