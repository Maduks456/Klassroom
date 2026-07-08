
</body>
</html>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                 <form action="icon/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class=" text-gray-900 dark:text-gray-100">
                        Profile Picture
                        <input type="file" name="icon">
                    </label>
                    @error("name")
                            <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class=" text-gray-900 dark:text-gray-100">Upload Picture</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>