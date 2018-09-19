@extends('layouts.2-columns')

@section('title', 'Poser une question')

{{-- Search form section --}}
@section('search-form')
    <div class="clearfix"></div>
@endsection

@section('content')

    <article class="question single-question question-type-normal">
        <h2>
            <span class="color">{{ $question->title }}</span>
        </h2>
        <div class="question-author-date">
            Asked <em>{{ $question->created_at }}</em> by <span class="color">{{ $question->user->name }}</span>
        </div>
        <div class="question-inner">
            <div class="clearfix"></div>
            <div class="question-desc">
                {{ $question->description }}
            </div>
            <div class="question-details">
                <span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>
            </div>
            <span class="question-comment"><a href="#commentlist"><i class="icon-comment"></i>{{ $nbrAnswers }} Answer(s)</a></span>
            <span class="question-view"><i class="icon-user"></i>70 views</span>
            <div class="question-tags"><i class="icon-tags"></i>
                <a href="#!">{{ $question->category }}</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </article>

    <div class="post-next-prev clearfix">
        <p class="prev-post">
            <a href="{{ url('questions/'.$previousQuestionId) }}"><i class="icon-double-angle-left"></i>&nbsp;Prev question</a>
        </p>
        <p class="next-post">
            <a href="{{ url('questions/'.$nextQuestionId) }}">Next question&nbsp;<i class="icon-double-angle-right"></i></a>
        </p>
    </div><!-- End post-next-prev -->


    <div id="commentlist" class="page-content">
        <div class="boxedtitle page-title"><h2>Answers ( <span class="color">{{ $nbrAnswers }}</span> )</h2></div>
        <ol class="commentlist clearfix">
            @forelse($answers as $answer)
            <li class="comment">
                <div class="comment-body comment-body-answered clearfix">
                    <div class="comment-text">
                        <div class="author clearfix">
                            <div class="comment-author"><span class="color">{{ $answer->user->name }}</span></div>
                            <div class="comment-vote">
                                @if (!in_array($answer->id, $userPreviousVotes))
                                <ul class="question-vote">
                                    <li>
                                        {!! Form::open(['action' => 'UpvoteController@store', 'method' => 'post']) !!}
                                            {!! Form::hidden('question_id', $question->id) !!}
                                            {!! Form::hidden('answer_id', $answer->id) !!}
                                            {!! Form::submit('+1', ['class' => 'question-vote-up']) !!}
                                        {!! Form::close() !!}
                                    </li>
                                    <!--<li><a href="#" class="question-vote-down" title="Dislike"></a></li>!-->
                                </ul>
                                @endif
                            </div>
                            <span class="question-vote-result">
                                {{$answer->upvotes_count}}
                            </span>
                            <div class="comment-meta">
                                <div class="date"><i class="icon-time"></i>{{ $answer->created_at }}</div>
                            </div>
                            {{--<a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a>--}}
                        </div>
                        <div class="text"><p>{{ $answer->description }}</p>
                        </div>
                        {{--<div class="question-answered question-answered-done"><i class="icon-ok"></i>Best Answer</div>--}}
                    </div>
                </div>
            </li>
            @empty
                <p class="text-center">There are no answer yet</p>
            @endforelse
        </ol><!-- End commentlist -->
    </div><!-- End page-content -->


    @if (Auth::check())
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="respond" class="comment-respond page-content clearfix">
        <div class="boxedtitle page-title"><h2>Leave a reply</h2></div>
        {!! Form::open(['action' => 'AnswerController@store', 'method' => 'post']) !!}
            {!! Form::hidden('question_id', $question->id) !!}
            <div id="respond-textarea">
                <p>
                    <label class="required" for="description">Your answer<span>*</span></label>
                    {!! Form::textarea('description', null, [
                        'id'      => 'description',
                        'cols'    => 58,
                        'rows'    => 8
                    ]) !!}
                    @if ($errors->has('description'))
                        <span class="color form-description">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </p>
            </div>
            <p class="form-submit">
                {!! Form::submit('Post your answer', ['id' => 'submit', 'class' => 'button color small']) !!}
            </p>
        {!! Form::close() !!}
    </div>
    @else
        <a class="button color large" href="{{route('login')}}">Connectez vous pour répondre</a>
    @endif
    {{-- Sidebar --}}
    @section('sidebar')
        <div class="widget">
            <h3 class="widget_title">Related Questions</h3>
            <ul class="related-posts">
                <li class="related-item"><h3><a href="#!"><i class="icon-double-angle-right"></i>This Is My Second Poll Question</a></h3></li>
                <li class="related-item"><h3><a href="#!"><i class="icon-double-angle-right"></i>This is my third Question</a></h3></li>
                <li class="related-item"><h3><a href="#!"><i class="icon-double-angle-right"></i>This is my fourth Question</a></h3></li>
                <li class="related-item"><h3><a href="#!"><i class="icon-double-angle-right"></i>This is my fifth Question</a></h3></li>
            </ul>
        </div>

        @parent
    @endsection
@endsection
