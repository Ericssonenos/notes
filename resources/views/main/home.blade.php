@extends('layouts.mainLayout')
@section('content')
    <div class="container mx-auto mt-20 px-4">
        <div class="flex justify-center">
            <div class="w-full">

                @include('layouts.top_bar')

                <!-- no notes available -->
                @if (count($notes) == 0)
                    <div class="flex mt-20">
                        <div class="w-full text-center">
                            <p class="text-6xl mb-20 text-gray-500 opacity-50">You have no notes available!</p>
                            <a href="{{ route('new') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-5 rounded-lg text-lg inline-flex items-center">
                                <i class="fa-regular fa-pen-to-square mr-3"></i>Create Your First Note
                            </a>
                        </div>
                    </div>
                @else
                    <!-- notes are available -->
                    <div class="flex justify-end mb-3">
                        <a href="{{ route('new') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded inline-flex items-center">
                            <i class="fa-regular fa-pen-to-square mr-2"></i>New Note
                        </a>
                    </div>

                    @foreach ($notes as $note)
                        @include('main.components.note', ['note' => $note])
                    @endforeach
                @endif
                @error('id_error')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
@endsection
