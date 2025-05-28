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
  <script src="//unpkg.com/alpinejs" defer></script>

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
      <a style="color: white;" href="{{ route('Create.Service') }}"
        class="inline-flex items-center gap-2 px-5 py-2 bg-[#1ab79d] text-white font-semibold rounded-lg shadow-md hover:bg-[#17917f] transition">
        <i data-lucide="plus-circle" class="w-5 h-5"></i>
        Create Service
      </a>

    </nav>
    <main>
      <div style="width: 100%;" class="bg-white shadow-xl rounded-2xl p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
          <i data-lucide="list" class="w-6 h-6 text-[#1ab79d]"></i>
          All Services
        </h2>

        <table class="min-w-full table-auto text-sm text-left text-gray-700 border border-gray-200 rounded-xl overflow-hidden">
          <thead class="bg-[#1ab79d] text-white text-sm tracking-wider">
            <tr>
              <th class="px-6 py-3">Title</th>
              <th class="px-6 py-3">Photo</th>
              <th class="px-6 py-3 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($services as $service)
            <tr x-data="{ open: false }"> {{-- Alpine state هنا --}}
              <!-- Title -->
              <td class="px-6 py-4 font-medium">{{ $service->title }}</td>

              <!-- Photo -->
              <td class="px-6 py-4">
                <img src="{{ asset('storage/' . $service->photo) }}" alt="Service Photo" class="w-16 h-16 object-cover rounded-xl shadow">
              </td>

              <!-- Actions -->
              <td class="px-6 py-4 text-center space-x-2">
                <!-- View -->
                <button @click="open = true"
                  class="inline-flex items-center justify-center w-9 h-9 text-[#1ab79d] hover:bg-[#1ab79d]/10 rounded-full transition"
                  title="View">
                  <i data-lucide="eye" class="w-5 h-5"></i>
                </button>

                <!-- Edit -->
                <a href="{{ route('service.edit', $service->id) }}"
                  class="inline-flex items-center justify-center w-9 h-9 text-yellow-500 hover:bg-yellow-100 rounded-full transition"
                  title="Edit">
                  <i data-lucide="edit-3" class="w-5 h-5"></i>
                </a>

                <!-- Delete -->
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="inline-flex items-center justify-center w-9 h-9 text-red-500 hover:bg-red-100 rounded-full transition"
                    title="Delete">
                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                  </button>
                </form>

                <!-- Modal -->
                <div
                  x-show="open"
                  x-transition
                  class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                  style="display: none;"
                  @click.away="open = false">
                  <div
                    class="bg-white rounded-xl shadow-xl max-w-lg w-full p-6 relative"
                    @keydown.escape.window="open = false">
                    <button
                      @click="open = false"
                      class="absolute top-4 right-4 text-gray-500 hover:text-gray-700"
                      aria-label="Close modal">
                      <i data-lucide="x" class="w-6 h-6"></i>
                    </button>

                    <h3 class="text-xl font-semibold mb-4 text-[#1ab79d]">{{ $service->title }}</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $service->description }}</p>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <script>
        document.addEventListener('alpine:init', () => {
          lucide.createIcons(); // لتفعيل أيقونات Lucide بعد تحميل Alpine
        });
      </script>

    </main>

  </section>
  @vite('resources/js/AdminDashboard.js')
  <script>
    document.addEventListener('alpine:init', () => {
      lucide.createIcons(); // لتفعيل أيقونات Lucide بعد تحميل Alpine
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('service-modal');
      const modalDescription = document.getElementById('modal-description');
      const closeButton = document.querySelector('.close-button');
      const readMoreLinks = document.querySelectorAll('.read-more');

      readMoreLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const description = this.getAttribute('data-description');
          modalDescription.textContent = description;
          modal.style.display = 'block';
        });
      });

      closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
      });

      window.addEventListener('click', function(e) {
        if (e.target === modal) {
          modal.style.display = 'none';
        }
      });
    });
  </script>

</body>

</html>