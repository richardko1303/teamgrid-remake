<?php namespace Teamgrid\Task;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Models\User;
use Teamgrid\Task\Classes\Extend\UserExtend;

/**
 * task Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'task',
            'description' => 'No description provided yet...',
            'author'      => 'teamgrid',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        UserExtend::UserExtend();
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'task' => [
                'label'       => 'Tasks',
                'url'         => Backend::url('teamgrid/task/Tasks'),
                'icon'        => 'icon-check-square',
                'permissions' => ['teamgrid.task.*'],
                'order'       => 500,
            ],
        ];
    }
}
