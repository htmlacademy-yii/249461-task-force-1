<?php

namespace taskForce\model;

use taskForce\model\actions\CanceledAction;
use taskForce\model\actions\PerfomedAction;
use taskForce\model\actions\RefuseAction;
use taskForce\model\actions\RespondAction;

/**
 * Class Task - возвращает статусы и доступные действия
 */
class Task {

    /**
     * Константы доступных статусов
     */
    const STATUS_NEW = 'new';               // новая
    const STATUS_CANCELED = 'canceled';     // отменена
    const STATUS_PROGRESS = 'progress';     // в работе
    const STATUS_COMPLETED = 'completed';   // выполнена
    const STATUS_FAILED = 'failed';         // провалена

    /**
     * Константы доступных действий
     */
    const ACTION_CANCEL = 'cancel';         // отменить
    const ACTION_PERFOMED = 'perfomed';     // выполнена
    const ACTION_RESPOND = 'respond';       // откликнутся
    const ACTION_REFUSE = 'refuse';         // отказаться


    public $currentStatus = self::STATUS_NEW;

    private $idExecutor;
    private $idClient;

    /**
     * Возвращает id исполнителя
     */
    public function getIdExecutor() {
        return $this->idExecutor;
    }

    /**
     * Возвращает id заказчика
     */
    public function getIdClient() {
        return $this->idClient;
    }

    /**
     * Конструктор принимает id заказчика и исполнителя
     * @param int $idExecutor
     * @param int $idClient
     */
    public function __construct($idExecutor, $idClient) {
        $this->idExecutor = $idExecutor;
        $this->idClient = $idClient;
    }

    private $mapStatus = [
        self::STATUS_NEW => 'Новое',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_COMPLETED => 'Выполнено',
        self::STATUS_PROGRESS => 'В работе',
        self::STATUS_FAILED => 'Провалено'
    ];

    private $mapAction = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_PERFOMED => 'Выполнено',
        self::ACTION_RESPOND => 'Откликнуться',
        self::ACTION_REFUSE => 'Отказаться',
    ];

    public function getMapStatus() {
        return $this->mapStatus;
    }

    public function getMapAction($action) {
        return $this->mapAction[$action];
    }

    public function getNextStatus($action) {
        switch ($action) {
            case self::ACTION_CANCEL:
                return self::STATUS_CANCELED;
            case self::ACTION_PERFOMED:
                return self::STATUS_COMPLETED;
            case self::ACTION_RESPOND:
                return self::STATUS_PROGRESS;
            case self::ACTION_REFUSE:
                return self::STATUS_FAILED;
            default:
                return $this->currentStatus;
        }
    }

    public $availableActions = [];

    public function getAvailableAction($currentStatus, $id) {
        switch ($currentStatus) {
            case self::STATUS_NEW:
                $action = new RespondAction();
                if ($action->userRoleCheck($this->idClient, $this->idExecutor, $id)) {
                    return $action;
                }
                unset($action);

                $action = new CanceledAction();
                if ($action->userRoleCheck($this->idClient, $this->idExecutor, $id)) {
                    return $action;
                }

            case self::STATUS_PROGRESS:
                $action = new RefuseAction();
                if ($action->userRoleCheck($this->idClient, $this->idExecutor, $id)) {
                    return $action;
                }
                unset($action);

                $action = new PerfomedAction();
                if ($action->userRoleCheck($this->idClient, $this->idExecutor, $id)) {
                    return $action;
                };
        }
    }
}
