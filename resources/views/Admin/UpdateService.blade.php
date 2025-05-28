<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->

    <title>Pure Glanz</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="{{asset('images/logo233.png')}}" type="image/png">
    @vite('resources/css/DashboardStyle.css')
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        window.onload = () => {
            lucide.createIcons();
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <ul style="margin-top:55px" class="side-menu top">
            <li>
                <a href="{{ route('View.Services') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Services</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: 1rem; color: inherit;">
                        <i style="font-size: 25px; margin-left:11px" class='bx bxs-log-out-circle'></i>
                        <span style="margin-left: 7px;" class="text"> Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
        </nav>
        <main>
            <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg mx-auto space-y-6
            sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <i data-lucide="edit-3" class="w-6 h-6" style="color: #1ab79d;"></i>
                    Update Service
                </h2>

                <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1">
                            <i data-lucide="type" class="w-4 h-4 text-gray-500"></i>
                            Service Title
                        </label>
                        <input type="text" name="title" value="{{ old('title', $service->title) }}"
                            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2
                       @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-[#1ab79d] @enderror"
                            style="--tw-ring-color: #1ab79d;" placeholder="Enter service title" required>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1">
                            <i data-lucide="align-left" class="w-4 h-4 text-gray-500"></i>
                            Description
                        </label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2
                       @error('description') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-[#1ab79d] @enderror"
                            style="--tw-ring-color: #1ab79d;" placeholder="Describe your service..." required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Photo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1">
                            <i data-lucide="image" class="w-4 h-4 text-gray-500"></i>
                            Current Service Photo
                        </label>
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="Service Photo" class="w-32 h-32 object-cover rounded-xl shadow mb-2">
                    </div>

                    <!-- New Photo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center gap-1">
                            <i data-lucide="image" class="w-4 h-4 text-gray-500"></i>
                            Change Service Photo (optional)
                        </label>
                        <input type="file" name="photo" accept="image/*"
                            class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                       @error('photo') border-red-500 focus:ring-red-500 @else bg-[#e0f7f3] text-[#1ab79d] @enderror"
                            style="--tw-bg-opacity: 1; --tw-text-opacity: 1;">
                        @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full text-white py-3 rounded-xl font-semibold transition-all flex items-center justify-center gap-2"
                            style="background-color: #1ab79d;">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            Update Service
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </section>
    @vite('resources/js/AdminDashboard.js')
</body>

</html>