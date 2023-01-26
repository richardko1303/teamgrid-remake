<?php
    namespace Teamgrid\Project\Classes\Extend;
    
    use RainLab\User\Models\User;

    class Userextend {
        public static function UserExtend() {
            User::extend(function($model) {
                $model->hasMany['projects'] = ['Teamgrid\Project\Models\Project'];
            });
        }
    }
