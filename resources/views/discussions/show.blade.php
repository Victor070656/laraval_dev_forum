@extends('layouts.app')

@section('title')
    {{ $discussion->title }}
@endsection

@section('content')
    @livewire('navbar-main')

    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img class="h-10 w-10 rounded-full"
                                src="https://www.gravatar.com/avatar/{{ md5($discussion->user->email) }}?d=mp"
                                alt="{{ $discussion->user->name }}">
                            <div>
                                <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $discussion->title }}
                                </h1>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Posted by {{ $discussion->user->name }}
                                    <span class="mx-1">&bull;</span>
                                    {{ $discussion->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        @auth
                            @if(auth()->id() === $discussion->user_id)
                                <div class="flex items-center space-x-2">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Edit
                                    </button>
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Delete
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:px-6">
                    <div class="prose dark:prose-invert max-w-none">
                        {{ $discussion->body }}
                    </div>
                </div>
            </article>

            @livewire('discussion-comments', ['discussion' => $discussion])
        </div>
    </div>
@endsection
