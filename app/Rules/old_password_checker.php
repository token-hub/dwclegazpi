<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
use Auth;

class old_password_checker implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
 
    public function passes($attribute, $value)
    {
       $user = User::find(auth::user()->id);
      if (\Hash::check($value, $user->password)) {
        return true;
      } 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Old password is incorrect';
    }
}
