<?php

class Task {
    const STATUS_NEW = 'new';
    const STATUS_CANCELED = 'canceled';
    const STATUS_PROGRESS = 'progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    const ACTION_CANCEL = 'cancel';
    const ACTION_PERFOMED = 'perfomed';
    const ACTION_RESPOND = 'respond';
    const ACTION_REFUSE = 'refuse';

    public $currentStatus = self::STATUS_NEW;

    private $idExecutor;
    private $idClient;

    public function getIdExecutor() {
        return $this->idExecutor;
    }

    public function getIdClient() {
        return $this->idClient;
    }

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

    public function getStatus($action) {
        switch ($action) {
            case self::ACTION_CANCEL:
                return $this->currentStatus = self::STATUS_CANCELED;
            case self::ACTION_PERFOMED:
                return $this->currentStatus = self::STATUS_COMPLETED;
            case self::ACTION_RESPOND:
                return $this->currentStatus = self::STATUS_PROGRESS;
            case self::ACTION_REFUSE:
                return $this->currentStatus = self::STATUS_FAILED;
            default:
                return $this->currentStatus = self::STATUS_NEW;
        }
    }

    public function getAction($currentStatus, $id) {
        if ($id === self::getIdExecutor()) {
            switch ($currentStatus) {
                case self::STATUS_NEW:
                    return $this->mapAction[self::ACTION_RESPOND];
                case self::STATUS_PROGRESS:
                    return $this->mapAction[self::ACTION_REFUSE];
            }
        } elseif ($id === self::getIdClient()) {
            switch ($currentStatus) {
                case self::STATUS_NEW:
                    return $this->mapAction[self::ACTION_CANCEL];
                case self::STATUS_PROGRESS:
                    return $this->mapAction[self::ACTION_PERFOMED];
            }
        } else {
            return print('Действие или пользователь не определены');
        }
    }
}
