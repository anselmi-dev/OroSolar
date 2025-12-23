<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Obtener el valor de una configuración por su clave
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Establecer el valor de una configuración
     *
     * @param string $key
     * @param mixed $value
     * @return Setting
     */
    public static function set(string $key, $value): Setting
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
