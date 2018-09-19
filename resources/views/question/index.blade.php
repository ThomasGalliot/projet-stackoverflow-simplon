@extends('layouts.2-columns')

@section('title', 'Poser une question')

{{-- Search form section --}}
@section('search-form')
    @include('partials/search')
@endsection


@section('content')
    @foreach($questions as $question)
        <article class="question question-type-normal">
            <h2>
                <a href="{{ route('questions.show', ['id' => $question->id]) }}">{{ $question->title }}</a>
            </h2>
            <div class="question-author-date">
                Asked <em>{{ $question->created_at }}</em> by <span class="color">{{ $question->user->name }}</span>
            </div>
            <div class="question-inner">
                <div class="clearfix"></div>
                <p class="question-desc">{{ $question->description }}</p>
                {{--<div class="question-details">--}}
                    {{--<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>--}}
                {{--</div>--}}
                <span class="question-comment"><a href="{{ route('questions.show', ['id' => $question->id]) }}"><i class="icon-comment"></i> {{ $question->answers()->count('question-id') }} Answer(s)</a></span>
                <span class="question-view"><i class="icon-user"></i>70 views</span>
                <div class="question-tags"><i class="icon-tags"></i>
                    <a href="#!">{{ $question->category }}</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </article>
    @endforeach

    {{--<a href="#" class="load-questions"><i class="icon-refresh"></i>Load More Questions</a>--}}

    {{-- Sidebar --}}
    @section('sidebar')
        <div class="widget">
            <h3 class="widget_title">Recent Questions</h3>
            <ul class="related-posts">
                @foreach($recentQuestions as $recentQuestion)
                <li class="related-item">
                    <h3><a href="{{ route('questions.show', ['id' => $recentQuestion->id]) }}">{{ $recentQuestion->title }}</a></h3>
                    <p>{{ $recentQuestion->description }}</p>
                    <div class="clear"></div><span>{{ $recentQuestion->created_at }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        @parent
    @endsection

@endsection
