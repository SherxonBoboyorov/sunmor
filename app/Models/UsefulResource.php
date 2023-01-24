<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class UsefulResource extends Model
{
    use HasFactory;

    protected $table = 'useful_resources';

    protected $fillable = [
        'image'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/usefulResource/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/usefulResource/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $usefulResource): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $usefulResource->image)) {
                File::delete(public_path() . $usefulResource->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/usefulResource/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/usefulResource/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $usefulResource->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/usefulResource/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/usefulResource/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
