<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="/edit-answers/{{$homeworkAnswers->id}}" method="POST" enctype="multipart/form-data">
                     @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$homeworkAnswers->homework_id}}" name="homework_id">
                    <input type="text" name="comment" value="{{ old('comment', $homeworkAnswers->comment)}}">
                    @error('comment')
                        <span style="color:red">{{ $message }}</span>
                    @enderror

                    <a href="{{ asset('uploads/' . $homeworkAnswers->answer_file) }}" download> {{ basename($homeworkAnswers->answer_file) }}</a> 
                    <div>
                        <input type="file" name="answer_file" >
                        @error('answer_file')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    <small>Leave empty to keep current file</small>
                    </div>
                    <button>Save Answer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>