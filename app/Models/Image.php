<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public static function editImage(Request $request, $employee)
    {
        $image = $request->file('image');

        File::delete(public_path('images/' . $employee->image));
        if ($image) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $filename);
            $image = $filename;
        }

        return $image;
    }
}
