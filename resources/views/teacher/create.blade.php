<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-100 to-white py-12 px-4">

        <div class="max-w-2xl mx-auto">

            <!-- Card -->
            <div class="bg-white shadow-2xl rounded-3xl p-10 border border-gray-200">

                <!-- Title -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                        Izveidot Blogu
                    </h1>

                    <p class="text-gray-500">
                        Izveido savu jauno bloga ierakstu
                    </p>
                </div>

                <!-- Error -->
                @error("class_name")
                    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
                        {{ $message }}
                    </div>
                @enderror

                <!-- Form -->
                <form method="POST" action="/dashboard" class="space-y-6">
                    @csrf

                    <!-- Input -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Bloga Nosaukums
                        </label>

                        <input 
                            name="class_name"
                            placeholder="Ievadi bloga nosaukumu..."
                            class="w-full px-5 py-4 rounded-2xl border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition"
                        />
                    </div>

                    <!-- Button -->
                    <button 
                        class="w-full bg-black text-white py-4 rounded-2xl font-bold text-lg hover:bg-gray-800 transition shadow-lg"
                    >
                        Saglabāt
                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>