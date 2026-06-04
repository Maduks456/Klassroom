<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h1> {{$homework->homework_name}} edit</h1>
                </div>
                <div>
                    <form action="/homework/{{ $homework->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="">
                            Homework name
                        </label>
                        <input type="text" name="homework_name" required>
                        @error("homework_name")
                        <p>{{ $message }}</p>
                        @enderror
                        <a href="{{ asset('uploads/' . $homework->homework_file) }}" download> {{ basename($homework->homework_file) }}</a> 
                        <div>
                            <input type="file" name="homework_file" >
                            @error("homework_file")
                            <p>{{ $message }}</p>
                            @enderror
                        <br><small>Leave empty to keep current file</small>
                        </div>
                        <button>Update task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>