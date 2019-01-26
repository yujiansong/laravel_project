<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EmailVerifiedAtScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
        return $builder->whereNotNull('email_verified_at');
    }
}