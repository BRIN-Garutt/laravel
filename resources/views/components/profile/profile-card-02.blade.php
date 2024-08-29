<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Erlangga Widhi Pramono</h2>
            <!-- Menu button -->
            <div class="relative inline-flex" x-data="{ open: false }">
                <button
                    class="rounded-full"
                    :class="open ? 'bg-gray-100 dark:bg-gray-700/60 text-gray-500 dark:text-gray-400': 'text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400'"
                    aria-haspopup="true"
                    @click.prevent="open = !open"
                    :aria-expanded="open">
                    <span class="sr-only">Menu</span>
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                        <circle cx="16" cy="16" r="2" />
                        <circle cx="10" cy="16" r="2" />
                        <circle cx="22" cy="16" r="2" />
                    </svg>
                </button>
                <div
                    class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1"
                    @click.outside="open = false"
                    @keydown.escape.window="open = false"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak>
                    <ul>
                        <li>
                            <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Informatics Engineering</div>
        
        <!-- Photo and Address Section -->
        <div class="p-3 flex flex-col items-center">
            <img class="object-cover object-center rounded-full" width="200" height="100" src="{{ asset('images/profil-angga.jpg') }}" alt="Profile image" />
            <!-- Address Section -->
            <div class="mt-6 text-sm text-gray-600 dark:text-gray-300">
                <!-- Skills -->
                <div class="flex items-center mb-1">
                    <img src="{{ asset('images/skill-logo.png') }}" alt="Address Icon" class="w-5 h-6 mr-3" />
                    <span>Skill : Web Developer / Android Developer</span>
                </div>
                <!-- Address -->
                <div class="flex items-center mb-1">
                    <img src="{{ asset('images/address-logo.png') }}" alt="Address Icon" class="w-5 h-6 mr-3" />
                    <span>Address : Garut, Jawa Barat</span>
                </div>
                <!-- Phone -->
                <div class="flex items-center">
                    <img src="{{ asset('images/phone-logo.png') }}" alt="Phone Icon" class="w-5 h-6 mr-3" />
                    <span>Phone : 081234567890</span>
                </div>
                <!-- Facebook -->
                <div class="flex items-center">
                    <img src="{{ asset('images/Facebook-logo.png') }}" alt="Phone Icon" class="w-5 h-6 mr-3" />
                    <span>Facebook : Erlangga</span>
                </div>
                <!-- Instagram -->
                <div class="flex items-center">
                    <img src="{{ asset('images/instagram-logo.png') }}" alt="Phone Icon" class="w-5 h-6 mr-3" />
                    <span>Instagram : Erlangga</span>
                </div>
                <!-- Linkedin -->
                <div class="flex items-center">
                    <img src="{{ asset('images/linkedin-logo.png') }}" alt="Phone Icon" class="w-5 h-6 mr-3" />
                    <span>LinkedIn : Erlangga</span>
                </div>
            </div>
        </div>
    </div>
</div>
