<?php namespace Teamgrid\Project\Models;

use Model;

/**
 * Project Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'teamgrid_project_projects';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        //TODO: PROZRI
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasMany = ['tasks' => 'Teamgrid\Project\Models\Task'];
    public $belongsTo = [
        'project_manager' => 'RainLab\User\Models\User',
        'customer' => 'RainLab\User\Models\User'
    ];
    public $belongsToMany = [
        'accounter' => [
            'RainLab\User\Models\User',
            'table' => 'teamgrid_project_accountants',
            'key' => 'project_id',
            'otherKey' => 'accounter_id'
        ]
    ];
}
