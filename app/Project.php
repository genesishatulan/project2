<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\ProjectCreated;

use App\Events\ProjectCreated;

class Project extends Model
{
    protected $guarded = [];    //accept this fields except theses fields(yung nasa loob)
    //assign guarded as long as you are never doing request()->all

    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    //

    // protected $fillable = [                     //give protection       //so it wont be mass assigned    //the only fillable fields
    //     'title', 'description'
    // ];
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}
