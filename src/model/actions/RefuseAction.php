<?php


namespace taskForce\model\actions;


class RefuseAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName()
    {
        return "Отказаться";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName()
    {
        return "refuse";
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
