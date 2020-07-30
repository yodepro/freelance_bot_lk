<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * ProfileForm form
 */
class ProfileForm extends Model
{

    public $email;
    public $user;

    public function __construct(User $user, $config = [])
    {
        parent::__construct($config);
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function rules() : array
    {
        return [

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class,
                'message' => 'Этот e-mail уже зарегистрирован.'],
        ];
    }
}
