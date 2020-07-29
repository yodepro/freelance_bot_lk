<?php

namespace frontend\themes\gulp;
use Yii;

class Theme extends \yii\base\Theme
{
    public  $pathMap = [
        '@frontend/views' => '@frontend/themes/gulp/views',
        '@frontend/modules' => '@frontend/themes/gulp/modules',
        '@frontend/widgets' => '@frontend/themes/gulp/widgets'
    ];

    public function  init(){
        parent::init();
    }
}
