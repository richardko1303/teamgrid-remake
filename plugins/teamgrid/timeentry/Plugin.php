<?php namespace Teamgrid\TimeEntry;

use Backend;
use System\Classes\PluginBase;
use Teamgrid\TimeEntry\Classes\Extend\UserExtend;
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
        Userextend::UserExtend();
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
