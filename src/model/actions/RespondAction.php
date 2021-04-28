<?php


namespace taskForce\model\actions;


class RespondAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName(): string
    {
        return "Откликнуться";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName(): string
    {
        return "respond";
    }

    /**
     * Проверяет права пользователя для этого действия
     */
    function userRoleCheck(int $clientId, int $executorId, int $currentUser): bool
    {
        if ($currentUser === $executorId) {
            return true;
        }

        return false;
    }
}
