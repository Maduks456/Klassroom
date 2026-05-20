<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h1> {{$user->name}} edit</h1>
                </div>
                <div>
                    <form action="/accounts/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label>
                            <input type="text" name="name" value="{{ old('name', $user->name)}}">
                        </label>
                        @error("name")
                            <p>{{ $message }}</p>
                        @enderror
                        <label>
                            <input type="text" name="password" value="{{ old('password', $user->password)}}">
                        </label>
                        @error("password")
                            <p>{{ $message }}</p>
                        @enderror
                        <label>
                            <input type="text" name="role" value="{{ old('role', $user->role)}}">
                        </label>
                        @error("role")
                            <p>{{ $message }}</p>
                        @enderror
                        <button>Saglabāt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>