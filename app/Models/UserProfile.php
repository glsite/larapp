<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    // Tabela w bazie danych (Laravel domyślnie szuka liczby mnogiej, ale warto wskazać jawnie)
    protected $table = 'user_profiles';

    // Pola, które mogą być bezpiecznie uzupełniane z formularzy / API
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Pola ukrywane przy zamianie modelu na JSON (np. w API)
    protected $hidden = [
        'password',
    ];
}
