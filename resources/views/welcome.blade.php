@extends('layouts.app')

@section('title')
    Welcome to {{ config('app.name', 'VDEV') }}
@endsection

@section('content')
    <style>
        @media(prefers-color-scheme: dark) {
            .bg-dots {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(200,200,255,0.15)'/%3E%3C/svg%3E");
            }
        }

        @media(prefers-color-scheme: light) {
            .bg-dots {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,50,0.10)'/%3E%3C/svg%3E")
            }
        }
    </style>

    @livewire('navbar-main')

    <div class="relative min-h-screen bg-gray-100 bg-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
        <!-- Hero Section -->
        <div class="relative pt-24 pb-32 overflow-hidden">
            <div class="relative">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
                    <div class="mx-auto max-w-xl px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0">
                        <div>
                            <div>
                                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600">
                                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-6">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Join the Discussion
                                </h2>
                                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                                    Welcome to our vibrant community where ideas flourish and connections are made. Share your thoughts,
                                    ask questions, and engage in meaningful discussions with fellow members.
                                </p>
                                <div class="mt-6">
                                    <a href="{{ route('discussions') }}" wire:navigate
                                        class="inline-flex rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
                                        Browse Discussions
                                        <span class="text-indigo-200 ml-2" aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 sm:mt-16 lg:mt-0">
                        <div class="-mr-48 pl-6 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                            <div class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none">
                                <div class="rounded-xl bg-gray-50 dark:bg-gray-800 p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Recent Discussions</h3>
                                    <div class="space-y-4">
                                        @foreach(\App\Models\Discussion::with('user')->latest()->take(3)->get() as $discussion)
                                            <div class="flex items-start space-x-4">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://www.gravatar.com/avatar/{{ md5($discussion->user->email) }}?d=mp"
                                                    alt="{{ $discussion->user->name }}">
                                                <div class="min-w-0 flex-1">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                        <a href="{{ route('discussions.show', $discussion) }}" wire:navigate
                                                            class="hover:text-indigo-600 dark:hover:text-indigo-400">
                                                            {{ $discussion->title }}
                                                        </a>
                                                    </p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                                        by {{ $discussion->user->name }} &middot; {{ $discussion->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="relative bg-gray-50 dark:bg-gray-800 py-16 sm:py-24 lg:py-32">
            <div class="mx-auto max-w-md px-6 text-center sm:max-w-3xl lg:max-w-7xl lg:px-8">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">Community Features</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    Everything you need to connect and share
                </p>
                <p class="mx-auto mt-5 max-w-prose text-xl text-gray-600 dark:text-gray-300">
                    Our platform provides all the tools you need to engage with the community and share your knowledge.
                </p>
                <div class="mt-12">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="pt-6">
                            <div class="flow-root rounded-lg bg-gray-100 dark:bg-gray-900 px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                                        <span class="inline-flex items-center justify-center rounded-xl bg-indigo-600 p-3 shadow-lg">
                                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Rich Discussions
                                    </h3>
                                    <p class="mt-5 text-base text-gray-600 dark:text-gray-300">
                                        Start meaningful discussions with markdown support, code highlighting, and more.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root rounded-lg bg-gray-100 dark:bg-gray-900 px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                                        <span class="inline-flex items-center justify-center rounded-xl bg-indigo-600 p-3 shadow-lg">
                                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Active Community
                                    </h3>
                                    <p class="mt-5 text-base text-gray-600 dark:text-gray-300">
                                        Connect with like-minded individuals and build lasting relationships.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root rounded-lg bg-gray-100 dark:bg-gray-900 px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                                        <span class="inline-flex items-center justify-center rounded-xl bg-indigo-600 p-3 shadow-lg">
                                            <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Modern Experience
                                    </h3>
                                    <p class="mt-5 text-base text-gray-600 dark:text-gray-300">
                                        Enjoy a beautiful, responsive design with dark mode support and real-time updates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="relative bg-gray-900 dark:bg-gray-950">
            <div class="relative h-80 overflow-hidden bg-indigo-600 md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&blend=6366F1&sat=-100&blend-mode=multiply"
                    alt="People working on laptops">
                <svg viewBox="0 0 926 676" aria-hidden="true"
                    class="absolute -bottom-24 left-24 w-[57.875rem] transform-gpu blur-[118px]">
                    <path fill="url(#60c3c621-93e0-4a09-a0e6-4c228a0116d8)" fill-opacity=".4"
                        d="m254.325 516.708-90.89 158.331L0 436.427l254.325 80.281 163.691-285.15c1.048 131.759 36.144 345.144 168.149 144.613C751.171 125.508 707.17-93.823 826.603 41.15c95.546 107.978 104.766 294.048 97.432 373.585L685.481 297.694l16.974 360.474-448.13-141.46Z" />
                    <defs>
                        <linearGradient id="60c3c621-93e0-4a09-a0e6-4c228a0116d8" x1="926.392" x2="-109.635" y1=".176"
                            y2="321.024" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#776FFF" />
                            <stop offset="1" stop-color="#FF4694" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="relative mx-auto max-w-7xl py-24 sm:py-32 lg:px-8 lg:py-40">
                <div class="pl-6 pr-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pl-24 lg:pr-0 xl:pl-32">
                    <h2 class="text-base font-semibold leading-7 text-indigo-400">Join us today</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Start sharing your ideas</p>
                    <p class="mt-6 text-base leading-7 text-gray-300">
                        Join our growing community of passionate individuals. Share your knowledge, learn from others,
                        and be part of meaningful discussions that matter.
                    </p>
                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('register') }}" wire:navigate
                            class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            Register Now
                        </a>
                        <a href="{{ route('discussions') }}" wire:navigate
                            class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Browse Discussions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
