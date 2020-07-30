<?php

declare(strict_types=1);

use yii\widgets\Menu; ?>

<?=

Menu::widget(
    [
        'options' => ['class' => 'profile-sidebar__menu'],
        'activeCssClass' => 'profile-sidebar__menu-item--active',
        'itemOptions' => [
            'class' => 'profile-sidebar__menu-item'
        ],
        'items' => [
            [
                'label' => 'Мой профиль',
                'url' => ['lk/index']
            ],
            [
                'label' => 'Редактировать профиль',
                'url' => ['lk/update']
            ],
            [
                'label' => 'Тарифы',
                'url' => ['lk/rates']
            ],
            [
                'label' => 'Изменить пароль',
                'url' => ['lk/password']
            ],
            [
                'label' => 'Выход',
                'url' => ['site/logout'],
                'template' => '<a href="{url}" data-method="post">{label}</a>'
            ]
        ]
    ]
);

?>
