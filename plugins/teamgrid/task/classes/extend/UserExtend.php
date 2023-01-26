<?php

namespace Teamgrid\Task\Classes\Extend;

use Rainlab\User\Models\User;

class Userextend {
    public static function UserExtend() {
        User::extend( function($model) {
            $model->hasMany['tasks'] = ['Teamgrid\Task\Models\Task'];
        });
    }
}