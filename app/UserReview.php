<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $table = 'user_reviews';

    protected $fillable = [
      'user_id', 'reviewer_id', 'project_id', 'overall', 'review',
    ];

    public function reviewer() {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
