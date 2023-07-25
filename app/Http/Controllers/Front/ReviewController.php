<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function review(ReviewRequest $reviewRequest)
    {
        Review::create($reviewRequest->validated());
    }
}
