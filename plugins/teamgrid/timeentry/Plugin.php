<?php namespace Teamgrid\TimeEntry;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Models\User;

/**
 * timeEntry Plugin Information File
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
            'name'        => 'timeEntry',
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
        User::extend(function ($model) {
            $model->hasMany['timeEntries'] = ['Teamgrid\TimeEntry\Models\TimeEntry'];
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Teamgrid\TimeEntry\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'teamgrid.timeentry.some_permission' => [
                'tab' => 'timeEntry',
                'label' => 'Some permission'
            ],
        ];
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
            'timeentry' => [
                'label'       => 'Time Entries',
                'url'         => Backend::url('teamgrid/timeentry/TimeEntries'),
                'icon'        => 'icon-clock-o',
                'permissions' => ['teamgrid.timeentry.*'],
                'order'       => 500,
            ],
        ];
    }
}
