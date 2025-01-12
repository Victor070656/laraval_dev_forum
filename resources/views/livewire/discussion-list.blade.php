<div>
    <div class="mt-6 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($discussions as $discussion)
                <li>
                    <a href="#" class="block hover:bg-gray-50 dark:hover:bg-gray-700">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center min-w-0 space-x-3">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://www.gravatar.com/avatar/{{ md5($discussion->user->email) }}?d=mp"
                                            alt="{{ $discussion->user->name }}">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400 truncate">
                                            {{ $discussion->title }}
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            <span>{{ $discussion->user->name }}</span>
                                            <span class="mx-1">&bull;</span>
                                            <span>{{ $discussion->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex items-center space-x-4">
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $discussion->comments_count ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <li class="px-4 py-5 sm:px-6">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No discussions</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new discussion.</p>
                        @auth
                            <div class="mt-6">
                                <a href="{{ route('discussions.create') }}" wire:navigate
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Start a discussion
                                </a>
                            </div>
                        @endauth
                    </div>
                </li>
            @endforelse
        </ul>
    </div>

    @if($discussions->hasPages())
        <div class="mt-6">
            {{ $discussions->links() }}
        </div>
    @endif
</div>
