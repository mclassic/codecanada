<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailingListUser extends Model
{
    protected $table      = 'mailing_list_users';
    protected $guarded    = ['id'];
    public    $timestamps = false;
}
