<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class ByUser implements CriterionInterface
{
    public function __construct(protected int $userId)
    {
    }

    public function apply($model)
    {
        return $model->where('user_id', $this->userId);
    }
}
