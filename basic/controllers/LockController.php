<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Lock;
use app\repositories\LockRepository;

class LockController extends Controller
{
    private $lockRepository;

    public function __construct($id, $module, LockRepository $lockRepository, $config = [])
    {
        $this->lockRepository = $lockRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $lock = new Lock();

        if ($lock->load(Yii::$app->request->post()) && $lock->save()) {
            Yii::$app->session->setFlash('success', 'Замок успешно добавлен.');
            return $this->redirect(['view', 'id' => $lock->id]);
        }

        return $this->render('create', [
            'lock' => $lock,
        ]);
    }

    public function actionView($id)
    {
        $lock = $this->lockRepository->findById($id);

        if (!$lock) {
            Yii::$app->session->setFlash('error', 'Замок не найден.');
            return $this->redirect(['index']);
        }

        return $this->render('view', [
            'lock' => $lock,
        ]);
    }
    
    // Другие функции контроллера
}