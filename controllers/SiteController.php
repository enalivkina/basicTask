<?php

namespace app\controllers;

use app\rules\UpdateRule;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRole(){
      /*  $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = 'Администратор';
        Yii::$app->authManager->add($admin);

        $worker = Yii::$app->authManager->createRole('co-worker');
        $worker->description = 'Сотрудник';
        Yii::$app->authManager->add($worker);

        $supervisor = Yii::$app->authManager->createRole('supervisor');
        $supervisor->description = 'Руководитель';
        Yii::$app->authManager->add($supervisor);

        $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = 'Право входа в админку';
        Yii::$app->authManager->add($permit);*/

        /*$role = Yii::$app->authManager->getRole('supervisor');
        $permit = Yii::$app->authManager->getPermission('canAdmin');
        Yii::$app->authManager->addChild($role, $permit);*/

        /*$auth = Yii::$app->authManager;
        $rule = new UpdateRule();
        $auth->add($rule);*/

        /*$auth = Yii::$app->authManager;
        $updateOwnPost = $auth->createPermission('updateTask');
        $updateOwnPost->description = 'Редактировать задание';
        $auth->add($updateOwnPost);*/

        // "updateOwnPost" наследует право "updatePost"
        /*$updatePost = Yii::$app->authManager->getPermission('updateTask');
        $updateOwnPost = Yii::$app->authManager->getPermission('updateOwnTask');
        $auth->addChild($updateOwnPost, $updatePost);

        $author = Yii::$app->authManager->getRole('co-worker');
// и тут мы позволяем автору редактировать свои посты
        $auth->addChild($author, $updateOwnPost);*/

        return 'yes';
    }


}
