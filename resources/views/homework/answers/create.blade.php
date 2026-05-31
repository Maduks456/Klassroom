<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="/give-answers/{{$homework->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{$homework->id}}" name="homework_id">
                    <input type="text" name="comment">
                     <input type="file" name="answer_file" required>
                     <button>Answer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>