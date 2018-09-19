<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestion;
use App\Http\Controllers\Controller;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;

class HomeController extends Controller
{
    protected $questionRepository;


    public function __construct(AnswerRepository $answerRepository,QuestionRepository $questionRepository)
    {
        parent::__construct($answerRepository, $questionRepository);
        $this->questionRepository = $questionRepository;
    }

    /**
     *
     */
    public function index()
    {
        $questions = $this->questionRepository->getOrdered();
        $recentQuestions = $this->questionRepository->getRecent(2);


        return view('homepage', compact('questions', 'recentQuestions'));
    }

}
