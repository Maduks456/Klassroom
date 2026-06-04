<x-guest-layout>
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-md bg-white border border-gray-200 rounded-2xl p-10">

        <!-- Logo + Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-black rounded-xl mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422A12 12 0 0112 21.5a12 12 0 01-6.16-10.922L12 14z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1">Welcome back</h1>
            <p class="text-sm text-gray-500">Login to continue to Klassroom</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1.5">Email</label>
                <div class="flex items-center gap-2.5 border border-gray-200 rounded-xl px-3 h-11 bg-gray-50 focus-within:border-white transition">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                    <x-text-input id="email" class="border-0 bg-transparent p-0 focus:ring-0 w-full text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="text-sm font-medium text-gray-600">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-gray-400 hover:text-black transition underline">Forgot password?</a>
                    @endif
                </div>
                <div class="flex items-center gap-2.5 border border-gray-200 rounded-xl px-3 h-11 bg-gray-50 focus-within:border-black transition">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                    <x-text-input id="password" class="border-0 bg-transparent p-0 focus:ring-0 w-full text-sm" type="password" name="password" required autocomplete="current-password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black focus:ring-black" name="remember">
                <label for="remember_me" class="text-sm text-gray-500">Remember me</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-black text-white h-11 rounded-xl font-semibold text-sm hover:bg-gray-800 transition flex items-center justify-center gap-2">
                Log in
            </button>

        </form>

        <!-- Divider -->
        <div class="flex items-center gap-3 my-6">
            <div class="flex-1 h-px bg-gray-200"></div>
            <span class="text-xs text-gray-400">or</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>


        <!-- Register link -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Don't have an account?
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-black font-semibold underline underline-offset-2 hover:text-gray-700 transition">Register</a>
            @endif
        </p>

    </div>
</div>
</x-guest-layout>