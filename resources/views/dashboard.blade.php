<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}<br><br>
                    <a href="{{ route('index') }}">Return to the forum</a>
                    <br>
                    <br>
                    Profile picture now:
                    <br>
                    <br>
                    <img src="{{ asset(Auth::user()->avatar) }}" alt="Profile picture" width="100px" height="100px">
                    <br>
                    <a href="{{ route('author.resetpfp', ['id' => Auth::user()->id]) }}" class="button button-contactForm">Reset profile picture</a>
                    <br>
                    <br>
                    New profile picture:
                    <br>
                    <form action="{{ route('profile.pfp') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="pfp">
                        <br>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  

    

</x-app-layout>
