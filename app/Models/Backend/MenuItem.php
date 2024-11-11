<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    // Mass-assignable attributes
    protected $fillable = [
        'name',
        'link',
        'parent_id',
        'status',
        'order',
    ];

    /**
     * Parent menu item relationship (self-referencing one-to-many).
     * A menu item can have a parent menu item.
     */
    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Children menu items relationship.
     * A menu item can have multiple child menu items.
     */
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    /**
     * Scope for only active (visible) menu items.
     */
    public function scopeVisible($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope for ordering menu items.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }




}
