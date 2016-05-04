<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class studentModel extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $primaryKey = 'studentPk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['studentId',
	                       'firstName',
	                       'surname',
						   'campus',		
						   'confirmation_code',
                            'profileImage',
						   'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function requests()
    {
        return $this->hasMany('App\Http\Models\requestModel', 'studentId');
    }

    //relationship between user and post table
    public function posts()
    {
        return $this->belongsTo('App\Posts'); //TODO
    }
}

?>