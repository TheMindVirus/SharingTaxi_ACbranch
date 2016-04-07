<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class requestModel extends Model
{
    protected $table = 'requests';
	protected $primaryKey = "requestId";

    protected $fillable = ['postId',
                           'studentId',
                           'requestStatus',
                           'destination'];
}

?>