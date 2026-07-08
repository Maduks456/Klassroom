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
                        <label class=" text-gray-900 dark:text-gray-100">
                            Homework name
                        </label>
                        <input type="text" name="homework_name" required>
                        @error("homework_name")
                        <p>{{ $message }}</p>
                        @enderror
                        <a  class=" text-gray-900 dark:text-gray-100"href="{{ asset('uploads/' . $homework->homework_file) }}" download> {{ basename($homework->homework_file) }}</a> 
                        <div>
                            <input  class=" text-gray-900 dark:text-gray-100"type="file" name="homework_file" >
                            @error("homework_file")
                            <p>{{ $message }}</p>
                            @enderror
                        <br><small class=" text-gray-900 dark:text-gray-100">Leave empty to keep current file</small>
                        </div>
                        <button class=" text-gray-900 dark:text-gray-100">Update task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>