<div class="mt-8">
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                Comments
            </h3>

            @auth
                <div class="mt-5">
                    <form wire:submit.prevent="postComment">
                        <label for="comment" class="sr-only">Add your comment</label>
                        <div>
                            <textarea
                                id="comment"
                                name="comment"
                                rows="3"
                                wire:model="newComment"
                                class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white"
                                placeholder="Add your comment..."
                            ></textarea>
                            @error('newComment')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-3 flex items-center justify-end">
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Post comment
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="rounded-md bg-yellow-50 dark:bg-yellow-900 p-4 mt-5">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-yellow-800 dark:text-yellow-100">
                                Please <a href="{{ route('login') }}" class="font-bold underline">sign in</a> to post a comment.
                            </p>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="mt-6 space-y-6">
                @forelse ($comments as $comment)
                    <div class="flex space-x-3">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                src="https://www.gravatar.com/avatar/{{ md5($comment->user->email) }}?d=mp"
                                alt="{{ $comment->user->name }}">
                        </div>
                        <div class="flex-grow">
                            <div class="text-sm">
                                <span class="font-medium text-gray-900 dark:text-white">{{ $comment->user->name }}</span>
                            </div>
                            <div class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                <p>{{ $comment->body }}</p>
                            </div>
                            <div class="mt-2 space-x-2 text-sm">
                                <span class="text-gray-500 dark:text-gray-400 font-medium">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 text-sm">No comments yet.</p>
                @endforelse

                @if ($comments->hasPages())
                    <div class="mt-4">
                        {{ $comments->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
