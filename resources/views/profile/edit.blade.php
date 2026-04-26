<x-app-layout>

    <!-- Pinspire Themed Background -->
    <div class="py-12 bg-[#fdeae7] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Update Profile Info Card -->
            <div class="p-6 sm:p-10 bg-white shadow-sm border border-gray-100 rounded-[2rem] hover:shadow-md transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="p-6 sm:p-10 bg-white shadow-sm border border-gray-100 rounded-[2rem] hover:shadow-md transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Card -->
            <div class="p-6 sm:p-10 bg-white shadow-sm border border-red-100 rounded-[2rem] hover:shadow-md transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
