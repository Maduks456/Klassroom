<x-guest-layout>

    <div class="overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">

        {{-- Header --}}
        <div class="flex items-center gap-2 px-4 py-3.5 bg-white border-b border-[#e3e3e0]">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#706f6c]"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <span class="text-[13px] font-medium text-[#1b1b18]">Log in</span>
        </div>

        <form method="POST" action="{{ route('login') }}" class="p-5 bg-[#fdfdfc] flex flex-col gap-4">
            @csrf

            {{-- Session status --}}
            <x-auth-session-status :status="session('status')" />

            {{-- Email --}}
            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-[11px] uppercase tracking-wider text-[#706f6c]">
                    {{ __('Email') }}
                </label>
                <input
                    id="email" type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="you@example.com"
                    required autofocus autocomplete="username"
                    class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors w-full"
                >
                <x-input-error :messages="$errors->get('email')" class="text-[12px] text-[#f53003]" />
            </div>

            {{-- Password --}}
            <div class="flex flex-col gap-1.5">
                <label for="password" class="text-[11px] uppercase tracking-wider text-[#706f6c]">
                    {{ __('Password') }}
                </label>
                <input
                    id="password" type="password" name="password"
                    placeholder="••••••••"
                    required autocomplete="current-password"
                    class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors w-full"
                >
                <x-input-error :messages="$errors->get('password')" class="text-[12px] text-[#f53003]" />
            </div>

            {{-- Remember me --}}
            <label for="remember_me" class="flex items-center gap-2 cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-3.5 h-3.5 rounded border-[#e3e3e0] accent-[#1b1b18] cursor-pointer">
                <span class="text-[13px] text-[#706f6c]">{{ __('Remember me') }}</span>
            </label>

            {{-- Actions --}}
            <div class="flex items-center justify-between pt-4 border-t border-[#e3e3e0]">
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-[13px] text-[#706f6c] underline underline-offset-2 hover:text-[#1b1b18]">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit"
                    class="text-[13px] bg-[#1b1b18] hover:bg-black text-white border border-[#1b1b18] rounded-md px-4 py-1.5 transition-colors">
                    {{ __('Log in') }}
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>