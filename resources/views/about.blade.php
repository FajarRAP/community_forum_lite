<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow sm:rounded-lg text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Tentang Aplikasi</h3>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Platform Tanya Jawab ini dibangun untuk memenuhi tugas kuliah Pemrograman Web Dinamis.
                    Aplikasi ini bertujuan memfasilitasi diskusi dan berbagi pengetahuan antar mahasiswa
                    dalam lingkungan kampus yang kolaboratif.
                </p>
            </div>

            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Tim Pengembang</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div
                            class="flex flex-col items-center p-4 border rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                            <div
                                class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-3">
                                <span class="text-xl font-bold">1</span>
                            </div>
                            <h4 class="font-bold text-gray-800">Nurul Aulia Salsabila </h4>
                            <p class="text-sm text-gray-500">NIM: 2200018313</p>
                            <p class="text-xs text-indigo-600 mt-1 font-medium">Backend Developer</p>
                        </div>

                        <div
                            class="flex flex-col items-center p-4 border rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                            <div
                                class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-3">
                                <span class="text-xl font-bold">2</span>
                            </div>
                            <h4 class="font-bold text-gray-800">Khairunisa Salsabila Kurniawan</h4>
                            <p class="text-sm text-gray-500">NIM: 2200018307</p>
                            <p class="text-xs text-indigo-600 mt-1 font-medium">Frontend Developer</p>
                        </div>

                        <div
                            class="flex flex-col items-center p-4 border rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                            <div
                                class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-3">
                                <span class="text-xl font-bold">3</span>
                            </div>
                            <h4 class="font-bold text-gray-800">Aliefa Rafi Antoni</h4>
                            <p class="text-sm text-gray-500">NIM: 2100018273</p>
                            <p class="text-xs text-indigo-600 mt-1 font-medium">Data Analyst</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Teknologi yang Digunakan</h3>
                <div class="flex flex-wrap gap-4">
                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm font-semibold">Laravel 12</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold">Tailwind
                        CSS</span>
                    <span
                        class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">MySQL</span>
                    <span
                        class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-semibold">Alpine.js</span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
