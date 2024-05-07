<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TopicRepository;
use App\Repositories\Contracts\UserRepository;

class TopicController extends Controller
{
    public function __construct(
        protected TopicRepository $topicRepository,
        protected UserRepository  $userRepository
    )
    {
    }

    public function index()
    {
        $topics = $this->topicRepository->all();

        return view('topics.index', [
            'topics' => $topics
        ]);
    }
}
