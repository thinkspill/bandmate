<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use Sortable;

    protected $sortable = ['id', 'name', 'start_date', 'website', 'still_active'];
    protected $fillable = ['name', 'start_date', 'website', 'still_active', 'slug'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
