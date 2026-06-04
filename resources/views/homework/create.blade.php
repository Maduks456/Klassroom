<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{$class->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$class->id}}" name="klass_id">
                    <label for="">
                        homework name: 
                         <input type="text" name="homework_name" required>
                    @error("homework_name")
                    <p>{{ $message }}</p>
                    @enderror
                    </label>
                    <label for="">
                        File: 
                        <input type="file" name="homework_file" required>
                    @error("homework_file")
                    <p>{{ $message }}</p>
                    @enderror
                    </label>
                    
                    <button>Create a task</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>