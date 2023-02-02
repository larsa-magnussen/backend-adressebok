<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Type\Integer;

class Contact extends Model
{
    use HasFactory;

    protected $dates = [
        'date_of_birth'
    ];

    public $guarded = ["id"];

    // så lenge variabelnavnet i caps brukes over hele programmet
    // vil man kunne endre navnet på kolonnene i tabellen uten å endre de mer enn 1 gang i programmet
    public const FIRST_NAME = "first_name";
    public const LAST_NAME = "last_name";
    public const ADDRESS = "address";
    public const COUNTRY = "country";
    public const PHONE_NUMBER = "phone_number";

    // samler alle emailadressene i en array per person
    public function emails(): HasMany
    {
        return $this->hasMany(ContactEmail::class, 'contact_id', 'id');
    }
    
    // samler alle notatene i en array per person
    public function notes(): HasMany
    {
        return $this->hasMany(ContactNote::class, 'contact_id', 'id');
    }

    // kalkulerer alder basert på fødselsdato
    public function getAgeAttribute(): int
    {
        $today = Carbon::now();
        return $today->diffInYears($this->date_of_birth);
    }
}
