<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class=" text-gray-900 dark:text-gray-100">Izveidot blogu</h1>
                @error("join_code")
                    <p>{{ $message }}</p>
                @enderror
                @if (session('error'))
                    <div class="text-red-500">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="/join">
                    @csrf
                    <input name="join_code"/>
                    <button class=" text-gray-900 dark:text-gray-100">Saglabāt</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>