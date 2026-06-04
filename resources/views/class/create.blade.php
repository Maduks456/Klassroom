
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Make a class</h1>
                
                <form method="POST" action="/dashboard">
                    @csrf
                    <label for="">
                        Class name: 
                        <input name="class_name"/>
                    @error("class_name")
                    <p>{{ $message }}</p>
                    @enderror
                    </label>
                    <button>Saglabāt</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>