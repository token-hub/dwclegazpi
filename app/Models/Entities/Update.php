<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;

class Update extends Model implements \MaddHatter\LaravelFullcalendar\IdentifiableEvent
{
    use LogsConfiguration;

	protected static $logName = 'web update';

    protected static $logAttributesToIgnore = ['clickable', 'paragraph'];

    protected $fillable = [
        'title', 'clickable', 'overview', 'category', 'paragraph', 'start_date', 'end_date'
    ];

    public function image() 
    {
    	return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
