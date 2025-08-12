<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-blue-600">{{ $note['text_title'] }}</h4>
                    <small class="text-gray-500">
                        <span class="opacity-75 mr-2">Created at:</span>
                        <strong>{{ date('Y-m-d H:i:s', strtotime($note['created_at'])) }}</strong>
                    </small>
                    @if($note['created_at'] != $note['updated_at'])
                        <small class="text-gray-500 ml-6">
                            <span class="opacity-75 mr-2">Updated at:</span>
                            <strong>{{ date('Y-m-d H:i:s', strtotime($note['updated_at'])) }}</strong>
                        </small>
                    @endif
                </div>
                <div class="mt-4 md:mt-0 flex space-x-2">
                    <a href="{{ route('edit', ['id' => Crypt::encrypt($note['id'])]) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 rounded text-gray-700 hover:bg-gray-100 text-sm">
                        <i class="fa-regular fa-pen-to-square mr-1"></i> Edit
                    </a>
                    <a href="{{ route('delete', ['id' => Crypt::encrypt($note['id'])]) }}" class="inline-flex items-center px-3 py-1 border border-red-300 rounded text-red-600 hover:bg-red-50 text-sm">
                        <i class="fa-regular fa-trash-can mr-1"></i> Delete
                    </a>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-gray-700">{{ $note['text_content'] }}</p>
        </div>
    </div>
</div>
