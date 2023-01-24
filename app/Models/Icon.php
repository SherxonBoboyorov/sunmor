<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Icon extends Model
{
    use HasFactory;

    protected $table = 'icons';

    protected $fillable = [
        'image',
        'title_en', 'title_es'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/icon/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/icon/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $icon): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $icon->image)) {
                File::delete(public_path() . $icon->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/icon/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/icon/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $icon->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/icon/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/icon/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
