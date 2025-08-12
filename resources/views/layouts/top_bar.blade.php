<div class="flex items-center justify-between mb-3">
    <div>
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Notes logo">
        </a>
    </div>
    <div class="text-center">
        A simple <span class="text-yellow-500">Laravel</span> project!
    </div>
    <div>
        <div class="flex items-center justify-end">
            <span class="mr-3 flex items-center">
                <i class="fa-solid fa-user-circle fa-lg text-gray-500 mr-3"></i>
                {{ session('user.username') }}
            </span>
            <a href="{{ route('logout') }}" class="btn border border-gray-400 text-gray-600 hover:bg-gray-50 px-3 py-2 rounded flex items-center">
                Logout<i class="fa-solid fa-arrow-right-from-bracket ml-2"></i>
            </a>
        </div>
    </div>
</div>

<hr class="border-gray-300">
