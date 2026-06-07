<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">

                {{-- Header --}}
                <div class="flex items-center gap-2 px-4 py-3.5 bg-white border-b border-[#e3e3e0]">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#706f6c]"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    <span class="text-[13px] font-medium text-[#1b1b18]">{{ $user->name }} — edit</span>
                </div>

                {{-- Form --}}
                <form action="/accounts/{{ $user->id }}" method="POST" class="p-5 bg-[#fdfdfc]">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="flex flex-col gap-1.5 mb-4">
                        <label for="name" class="text-[11px] uppercase tracking-wider text-[#706f6c]">Name</label>
                        <input
                            id="name" type="text" name="name"
                            value="{{ old('name', $user->name) }}"
                            class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors"
                        >
                        @error('name')
                            <p class="text-[12px] text-[#f53003]">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-1.5 mb-4">
                        <label for="password" class="text-[11px] uppercase tracking-wider text-[#706f6c]">Password</label>
                        <input
                            id="password" type="password" name="password"
                            placeholder="New password"
                            class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors"
                        >
                        @error('password')
                            <p class="text-[12px] text-[#f53003]">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="flex flex-col gap-1.5 mb-4">
                        <label for="role" class="text-[11px] uppercase tracking-wider text-[#706f6c]">Role</label>
                        <input
                            id="role" type="text" name="role"
                            value="{{ old('role', $user->role) }}"
                            class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors"
                        >
                        @error('role')
                            <p class="text-[12px] text-[#f53003]">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-between pt-4 border-t border-[#e3e3e0]">
                        <a href="/accounts" class="text-[13px] text-[#706f6c] underline underline-offset-2 hover:text-[#1b1b18]">
                            ← Back
                        </a>
                        <button type="submit"
                            class="text-[13px] bg-[#1b1b18] hover:bg-black text-white border border-[#1b1b18] rounded-md px-4 py-1.5 transition-colors">
                            Saglabāt
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>