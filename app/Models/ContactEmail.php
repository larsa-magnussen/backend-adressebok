<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'contact_emails';

    public const TYPE = 'type';
    public const EMAIL_ADDRESS = 'email_address';
}
