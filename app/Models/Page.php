<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'image',
        'title_en', 'title_es',
        'slug_en', 'slug_es',
        'description_en', 'description_es',
        'frame',
        'meta_title_en', 'meta_description_en',
        'meta_title_es', 'meta_description_es',
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/page/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/page/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $page): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $page->image)) {
                File::delete(public_path() . $page->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/page/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/page/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $page->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/page/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/page/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
