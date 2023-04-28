<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    use HasFactory;

    public static function addImage(Request $request)
    {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $request->file('image')->move(public_path('images'), $filename);
        $image = $filename;
        return $image;
    }
}
