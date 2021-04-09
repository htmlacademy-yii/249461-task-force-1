<?php


namespace taskForce\model\actions;


class CanceledAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName()
    {
        return "Отменить";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName()
    {
        return "cancel";
    }

    /**
     * Проверяет права пользователя для этого действия
     */
    function userRoleCheck($clientId, $executorId, $currentUser)
    {
        if ($currentUser === $clientId) {
            return true;
        }

        return false;
    }
}
