<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ThreadTitleUnique implements Rule
{
    public $thread_id;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($thread_id)
    {
        $this->thread_id = $thread_id;
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
        $thread = \App\Thread::find($this->thread_id);
            
        if(!$thread) {
            return false;
        }

        if($thread->title !== $value && \App\Thread::where('title', $value)->count()) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The thread title field must be unique.';
    }
}
