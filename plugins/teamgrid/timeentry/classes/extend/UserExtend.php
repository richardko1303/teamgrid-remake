<?php
    namespace Teamgrid\TimeEntry\Classes\Extend;
    
    use RainLab\User\Models\User;

    class UserExtend {
        public static function UserExtend() {
            User::extend(function ($model) {
                $model->hasMany['timeEntries'] = ['Teamgrid\TimeEntry\Models\TimeEntry'];
            });
        }
    }
