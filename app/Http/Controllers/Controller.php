<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use View;

class Controller extends BaseController
{
    protected $questionRepository;
    protected $answerRepository;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(AnswerRepository $answerRepository,QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;

        $nbrAnswers = $answerRepository->count();


        View::share(compact('nbrAnswers'));
    }
}
