@extends('layouts.app')

@section('title')
    Discussions
@endsection

@section('content')
    @livewire('navbar-main')

    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-0">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Discussions</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Join the conversation and share your thoughts with the community.
                </p>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Join the discussion</span>
                    </div>
                </div>
                @auth
                    <div class="ml-6 flex-shrink-0">
                        <a href="{{ route('discussions.create') }}" wire:navigate
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Start Discussion
                        </a>
                    </div>
                @endauth
            </div>

            @livewire('discussion-list')
        </div>
    </div>
@endsection
