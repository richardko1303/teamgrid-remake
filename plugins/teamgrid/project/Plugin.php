<?php namespace Teamgrid\Project;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Models\User;
use Teamgrid\Project\Classes\Extend\Userextend;

/**
 * project Plugin Information File
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
            'name'        => 'project',
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
            'project' => [
                'label'       => 'Projects',
                'url'         => Backend::url('teamgrid/project/Projects'),
                'icon'        => 'icon-cubes',
                'permissions' => ['teamgrid.project.*'],
                'order'       => 500,
            ],
        ];
    }
}
