<?php


namespace taskForce\model\actions;


class PerfomedAction extends AbstractAction
{

    /**
     * Возвращает название действия
     */
    function getActionName()
    {
        return "Выполнено";
    }

    /**
     * Возвращает системное название действия
     */
    function getActionSystemName()
    {
        return "perfomed";
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
