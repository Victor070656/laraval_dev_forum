@extends('layouts.app')

@section('title')
    Home
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
    {{-- navbar --}}
    @livewire('navbar-main')
    {{-- end navbar --}}
    <div
        class="relative min-h-screen bg-gray-100 bg-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">

        <div class="sm:flex sm:justify-center sm:items-center">


        </div>

        <div class="container px-2 xl:max-w-5xl mx-auto pb-6 pt-24">

            {{-- @session('status')
                <div class="text-teal">{{ $status }}</div>
            @endsession --}}

            <div class="card shadow-lg px-2 py-3 bg-base-200/50">
                <div class="bg-base-100 rounded-md p-2 font-black">
                    Discussion Room
                </div>
                <div class="card-body">
                    {{-- single post --}}
                    <div class="border-b border-gray-200 py-3">
                        <h1 class="text-2xl font-bold truncate">
                            Discussion Topic
                        </h1>
                        <p class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis quae minima et
                            exercitationem
                            aspernatur non dolorum, voluptates amet incidunt aperiam porro nostrum doloribus temporibus
                            doloremque perferendis nulla quasi voluptatem tempora.</p>
                        <div class="py-2 flex text-xs space-x-3 font-semibold text-rose-600">
                            <span class="">user name</span>
                            <span class="">01-06-2025</span>
                            <span class="">0 Comment(s)</span>
                        </div>
                    </div>
                    {{-- end single post --}}
                </div>
            </div>
        </div>

    </div>
@endsection
