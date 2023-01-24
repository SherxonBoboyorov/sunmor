<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Companycarrer extends Model
{
    use HasFactory;

    protected $table = 'companycarrers';

    protected $fillable = [
        'image',
        'content_en', 'content_es',
        'meta_title_en', 'meta_description_en',
        'meta_title_es', 'meta_description_es'
    ];

    public static function updateImage($request, $companycarrer): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $companycarrer->image)) {
                File::delete(public_path() . $companycarrer->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/companycarrer/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/companycarrer/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $companycarrer->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/companycarrer/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/companycarrer/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
