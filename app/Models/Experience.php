<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'period',
        'position',
    ];
    public static function filter(Request $request)
    {
        $query = self::query();
        if ($request->filled('search')) {
            $query->where('company', 'like', '%' . $request->input('search') . '%');
        }
        return $query;
    }

}
    

