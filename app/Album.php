<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Sortable;

    protected $sortable = [
        'band',
        'genre',
        'id',
        'label',
        'name',
        'number_of_tracks',
        'producer',
        'recorded_date',
        'release_date',
    ];

    protected $fillable = [
        'band_id',
        'genre',
        'label',
        'name',
        'number_of_tracks',
        'producer',
        'recorded_date',
        'release_date',
    ];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
