<x-guest-layout>

    <div class="overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">

        {{-- Header --}}
        <div class="flex items-center gap-2 px-4 py-3.5 bg-white border-b border-[#e3e3e0]">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#706f6c]"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <span class="text-[13px] font-medium text-[#1b1b18]">Forgot password</span>
        </div>

        <div class="p-5 bg-[#fdfdfc]">

            {{-- Description --}}
            <p class="text-[13px] text-[#706f6c] leading-relaxed mb-5">
                {{ __('No problem. Enter your email address and we\'ll send you a reset link to choose a new password.') }}
            </p>

            {{-- Session status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="flex flex-col gap-1.5 mb-5">
                    <label for="email" class="text-[11px] uppercase tracking-wider text-[#706f6c]">
                        {{ __('Email') }}
                    </label>
                    <input
                        id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        required autofocus
                        placeholder="you@example.com"
                        class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors w-full"
                    >
                    <x-input-error :messages="$errors->get('email')" class="text-[12px] text-[#f53003]" />
                </div>

                {{-- Submit --}}
                <div class="flex justify-end pt-4 border-t border-[#e3e3e0]">
                    <button type="submit"
                        class="text-[13px] bg-[#1b1b18] hover:bg-black text-white border border-[#1b1b18] rounded-md px-4 py-1.5 transition-colors">
                        {{ __('Email password reset link') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-guest-layout>