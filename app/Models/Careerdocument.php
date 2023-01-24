<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Careerdocument extends Model
{
    use HasFactory;

    protected $table = 'careerdocuments';

    protected $fillable = [
        'image',
        'career_title_en', 'career_title_es',
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/careerdocument/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/careerdocument/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $careerdocument): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $careerdocument->image)) {
                File::delete(public_path() . $careerdocument->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/careerdocument/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/careerdocument/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $careerdocument->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/careerdocument/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/careerdocument/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
