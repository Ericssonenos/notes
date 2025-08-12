@extends('layouts.mainLayout')
@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="flex justify-center">
        <div class="w-full">

            @include('layouts.top_bar')

            <!-- label and cancel -->
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-4xl font-bold mb-0">NEW NOTE</p>
                </div>
                <div>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-red-500 text-red-500 rounded hover:bg-red-50">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>

            <!-- form -->
            <form action="{{ route('newNoteSubmit') }}" method="post">
                @csrf
                <div class="mt-12">
                    <div class="w-full">
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Note Title</label>
                            <input type="text" class="w-full px-3 py-2 bg-blue-600 text-white border border-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" name="text_title" value="{{ old('text_title') }}">
                            {{-- show error --}}
                            @error('text_title')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Note Text</label>
                            <textarea class="w-full px-3 py-2 bg-blue-600 text-white border border-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" name="text_content" rows="5">{{ old('text_content') }}</textarea>
                            {{-- show error --}}
                            @error('text_content')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"><i class="fa-solid fa-ban me-2"></i>Cancel</a>
                        <button type="submit" class="inline-flex items-center px-8 py-2 bg-gray-600 text-white rounded hover:bg-gray-700"><i class="fa-regular fa-circle-check me-2"></i>Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
