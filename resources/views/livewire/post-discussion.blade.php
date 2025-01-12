<div class="py-24">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">Start a Discussion</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Share your thoughts, ask questions, or start a conversation with the community.
                    </p>
                    <div class="mt-6">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                                Tips for a great discussion:
                            </span>
                        </div>
                        <ul class="mt-2 text-sm text-gray-500 dark:text-gray-400 space-y-2 list-disc list-inside">
                            <li>Be clear and concise in your title</li>
                            <li>Provide relevant details in the body</li>
                            <li>Be respectful and constructive</li>
                            <li>Check for similar discussions first</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit='submit'>
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white dark:bg-gray-800 space-y-6 sm:p-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Title
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="title" id="title" wire:model="title"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white"
                                        placeholder="What's on your mind?">
                                </div>
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Body
                                </label>
                                <div class="mt-1">
                                    <textarea id="body" name="body" rows="8" wire:model="body"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white"
                                        placeholder="Provide more details about your discussion topic..."></textarea>
                                </div>
                                @error('body')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg wire:loading class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span wire:loading.remove>Create Discussion</span>
                                <span wire:loading>Creating...</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
