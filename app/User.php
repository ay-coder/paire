<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName', 'email', 'password','type','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function Notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function Reaction()
    {
        return $this->hasMany(Reaction::class);
    }

    public function MilestoneCompletion()
    {
        return $this->hasMany(Milestone_completion::class);
    }

    static function getDetail()
    {
        $user = User::find(Auth::user()->id);
        return $user;
    }

    public function updateUserAction($request)
    {
        $user = User::find(Auth::user()->id);
        if($request->hasFile('profilePic')) {
            $image = $request->file('profilePic');
            $name = 'profilePic-'.$request->input('profilePic').'-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images\users');
            $image->move($destinationPath, $name);
            $user->profile_pic = $name;
        }
        if($request->input('oldimage')){
            $user->profile_pic = $request->input('oldimage');
        }
        if($request->input('password'))
        {
            $user->password = $request->input('password');
        }

        $user->updated_at = date('Y-m-d H:i:s');
        if($user->save()){
            return redirect()->route('profile')->with('success','Profile has been updated');
        }
        else{
            return redirect()->route('profile')->with('error','Error while updating Profile.');
        }



    }
}
