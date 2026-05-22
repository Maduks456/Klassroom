
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Izveidot blogu</h1>
                @error("class_name")
                    <p>{{ $message }}</p>
                @enderror
                <form method="POST" action="/dashboard">
                    @csrf
                    <input name="class_name"/>
                    <button>Saglabāt</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>