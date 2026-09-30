<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;

class StudentPolicy
{
    /**
     * Owner or admin can update.
     */
    public function update(User $user, Student $student): bool
    {
        return $user->id === $student->owner_id || $user->is_admin;
    }

    /**
     * Owner or admin can delete.
     */
    public function delete(User $user, Student $student): bool
    {
        return $user->id === $student->owner_id || $user->is_admin;
    }
}
