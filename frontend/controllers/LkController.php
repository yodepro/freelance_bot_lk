<?php

declare(strict_types=1);

namespace frontend\controllers;

use common\models\PaymentOrder;
use common\models\PaymentRate;
use common\models\User;
use frontend\models\PasswordForm;
use frontend\models\ProfileForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class LkController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
            /*            'verbs' => [
                            'class' => VerbFilter::className(),
                            'actions' => [
                                'logout' => ['post'],
                            ],
                        ],*/
        ];
    }

    public function actionIndex()
    {
        $profile = Yii::$app->user->identity;
        return $this->render('index',['profile' => $profile]);
    }

    public function actionUpdate()
    {
        /**
         * @var $profile User
         */
        $profile = Yii::$app->user->identity;
        $form = new ProfileForm($profile);

        if($form->load(Yii::$app->request->post()) && $form->validate()){
            $profile->email = $form->email;
            $profile->save();
            Yii::$app->session->setFlash('success', 'Данные успешно сохранены.');
        }

        return $this->render('update',['profile' => $profile, 'model' => $form]);
    }

    public function actionPassword()
    {
        /**
         * @var $profile User
         */
        $profile = Yii::$app->user->identity;
        $form = new PasswordForm();

        if($form->load(Yii::$app->request->post()) && $form->validate()){
            $profile->setPassword($form->password);
            $profile->save();
            Yii::$app->session->setFlash('error', 'Пароль успешно изменен.');
        }

        return $this->render('password',['profile' => $profile, 'model' => $form]);
    }

    public function actionRates()
    {
        /**
         * @var $profile User
         */
        $profile = Yii::$app->user->identity;

        $history = $profile->getPayments()
            ->alias('p')
            ->andWhere(['p.status' => PaymentOrder::STATUS_APPROVE])
            ->joinWith('rate')
            ->orderBy(['p.created_at' => SORT_DESC])
            ->limit(12)
            ->asArray()
            ->all();

        return $this->render('rates', [
            'profile' => $profile,
            'history' => $history
        ]);
    }
}
