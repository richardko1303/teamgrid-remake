<?php namespace Teamgrid\TimeEntry\Models;

use Model;
use Carbon\Carbon;

/**
 * TimeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'teamgrid_timeentry_time_entries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

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
    public $belongsTo = [
        'task' => 'Teamgrid\Task\Models\Task',
        'user' => 'RainLab\User\Models\User'
    ];

    //Metody
    public function beforeSave()
    {
        if ($this->tracked_end != null) {
            $start = Carbon::create($this->tracked_start);
            $finish = Carbon::create(now());
            $total_time = $start->diffInHours($start) . ':' . $start->diff($finish)->format('%I:%S');
    
            $this->total_time = $total_time;
        }
    }
}
