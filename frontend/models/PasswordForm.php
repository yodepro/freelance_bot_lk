<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * ProfileForm form
 */
class PasswordForm extends Model
{

    public $password;
    public $password_repeat;

    /**
     * {@inheritdoc}
     */
    public function rules() : array
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 8],

            ['password_repeat', 'required'],
            ['password_repeat', 'string', 'min' => 8],

            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }
}
