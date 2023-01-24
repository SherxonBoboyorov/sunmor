<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Heavytruck extends Model
{
    use HasFactory;

    protected $table = 'heavytrucks';

    protected $fillable = [
        'image',
        'truck_name_en', 'truck_name_es',
        'slug_en', 'slug_es',
        'truck_description_en', 'truck_description_es',
        'meta_title_en', 'meta_description_en',
        'meta_title_es', 'meta_description_es',
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/heavytruck/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/heavytruck/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $heavytruck): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $heavytruck->image)) {
                File::delete(public_path() . $heavytruck->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/heavytruck/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/heavytruck/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $heavytruck->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/heavytruck/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/heavytruck/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
