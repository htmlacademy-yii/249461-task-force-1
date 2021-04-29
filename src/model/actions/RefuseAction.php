<?php


namespace taskForce\model\actions;


class RefuseAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName(): string
    {
        return "Отказаться";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName(): string
    {
        return "refuse";
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
