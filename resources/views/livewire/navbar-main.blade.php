<div>
    <div class="navbar bg-primary-content fixed top-0 z-50 shadow-md">
        <div class="flex-1">
            <a href="{{ route('home') }}"
                class="btn btn-ghost text-lg font-extrabold bg-gradient-to-r from-primary-content to-secondary-content rounded-full px-4 py-2"
                wire:navigate>VDEV</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal text-xs items-center space-x-1 px-1 font-semibold">
                <li>
                    <a class="btn btn-ghost btn-circle" onclick="my_modal_1.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </a>
                </li>
                @auth
                    <li><a href="{{ route('discussions') }}" wire:navigate>Discussions</a></li>
                    <li>
                        <details>
                            <summary>{{ auth()->user()->name }}</summary>
                            <ul class="bg-base-100 rounded-t-none p-2">
                                <li><a>Profile</a></li>
                                <li><a href="{{ route('discussions.create') }}" wire:navigate>Start Discussion</a></li>
                                <li><a>Logout</a></li>
                            </ul>
                        </details>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" wire:navigate>Login</a></li>
                    <li>
                        <a href="{{ route('register') }}" wire:navigate>Register</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
    <dialog id="my_modal_1" class="modal modal-top">
        <div class="modal-box">
            <form action="" method="POST">
                @csrf
                <div class="form-control">
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" />
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn">Search</button>
            </form>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
</div>
</dialog>

</div>
