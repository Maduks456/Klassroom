<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="/give-answers/{{$homework->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{$homework->id}}" name="homework_id">
                    <label class=" text-gray-900 dark:text-gray-100">
                        Comment: 
                        <input type="text" name="comment">
                    @error("comment")
                    <p>{{ $message }}</p>
                    @enderror
                    </label>
                    <label class=" text-gray-900 dark:text-gray-100">
                        File: 
                        <input type="file" name="answer_file" required>
                     @error("answer_file")
                    <p>{{ $message }}</p>
                    @enderror
                    </label>
                    
                     
                     <button>Answer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>