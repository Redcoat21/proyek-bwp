    @extends('template.baseTemplate')

    @section('title')
        Admin Profile
    @endsection

    @section('content')
        <div class="flex flex-col">
            <div class="bg-zinc-100 my-6 mx-56 shadow-md">
            <div class="flex justify-between items-center p-10">
                <div class="text-2xl font-bold">
                    My Profile
                </div>
                <a href="{{'/listUser'}}" class="bg-blue-600 px-4 py-2 rounded text-white text-lg -mr-16">See List User</a>
                <form action="{{ route('auth.post.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-lg bg-red-700 text-white px-4 py-2 rounded">
                        Logout
                    </button>
                </form>
            </div>
                <div class="grid grid-cols-4 my-10 mx-10">
                    <div class="image-container flex items-center justify-center">
                        @if(auth()->user()->profile_picture)
                            <img src="{{ asset(auth()->user()->profile_picture) }}" class="h-30 rounded-full" alt="pp">
                        @else
                            <img src="{{ asset('asset/def_pp.jpg') }}" class="h-30 rounded-full" alt="pp">
                        @endif
                    </div>
                    <div class="col-span-2 flex items-center">
                        <div class="text-xl font-semibold m-3">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
