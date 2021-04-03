<?php


namespace taskForce\model\actions;


class RespondAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName()
    {
        return "Откликнуться";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName()
    {
        return "respond";
    }

    /**
     * Проверяет права пользователя для этого действия
     */
    function userRoleCheck($clientId, $executorId, $currentUser)
    {
        if ($currentUser === $executorId) {
            return true;
        }

        return false;
    }
}
