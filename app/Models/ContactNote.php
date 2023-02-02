<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactNote extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'contact_notes';

    public const NOTE = 'note';
}
