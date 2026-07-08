<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">

                {{-- Header --}}
                <div class="flex items-center gap-2 px-4 py-3.5 bg-white border-b border-[#e3e3e0]">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#706f6c]"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span class="text-[13px] font-medium text-[#1b1b18]">User profile</span>
                </div>

                {{-- Profile info --}}
                <div class="p-5 bg-[#fdfdfc]">
                    <div class="flex items-center gap-3.5 mb-5">
                        <div class="w-11 h-11 rounded-full bg-[#fff2f0] flex items-center justify-center text-[15px] font-medium text-[#c0301a] shrink-0">
                            {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr(strstr($user->name, ' '), 1, 1)) }}
                        </div>
                        <div>
                            <p class="text-[15px] font-medium text-[#1b1b18] leading-tight">{{ $user->name }}</p>
                            <p class="text-[12px] text-[#706f6c] mt-0.5">{{ $user->role }}</p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="grid grid-cols-2 gap-2.5 pt-4 border-t border-[#e3e3e0]">

                        <a href="{{ $user->id }}/edit" class="w-full">
                            <button type="button"
                                class="w-full flex items-center justify-center gap-1.5 text-[13px] bg-[#1b1b18] hover:bg-black text-white border border-[#1b1b18] rounded-md px-4 py-1.5 transition-colors">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                        </a>

                        <form action="{{ $user->id }}/delete" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-1.5 text-[13px] bg-[#fff2f0] hover:bg-[#ffe4e0] text-[#c0301a] border border-[#f5c4b3] rounded-md px-4 py-1.5 transition-colors">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                Dzēst
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>