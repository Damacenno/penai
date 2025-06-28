<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>@yield('title') | Hackathon</title>
</head>

<body class="bg-gray-50 text-gray-900">
  <div class="flex">

    <aside class="hidden lg:block top-0 left-0 h-100vh min-h-screen z-50 group
                  bg-[#e0f4ff] text-gray-900 flex flex-col justify-between items-center
                  p-4 w-16 hover:w-64 transition-all duration-300 ease-in-out overflow-hidden">

      <!-- LOGO -->
      <div class="flex flex-col items-center w-full transition-all duration-300">
        <img src="{{ asset('img/penai.png') }}" alt="logo Penai"
          class="rounded-full mb-6 transition-all duration-300 w-12 h-12 group-hover:w-[100px] group-hover:h-[100px]" />
      </div>

      <!-- NAVEGAÇÃO CENTRAL -->
      <nav class="flex flex-col items-center w-full space-y-6">

        <!-- Criar Nova -->
        <a href="{{ route('site.home') }}"
          class="flex flex-col items-center w-full hover:bg-cyan-300/40 p-2 rounded transition">
          <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
          </svg>
          <span
            class="text-sm font-medium text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
            Criar Nova
          </span>
        </a>

        <!-- Histórico -->
        <a href="{{ route('site.history') }}"
          class="flex flex-col items-center w-full hover:bg-cyan-300/40 p-2 rounded transition">
          <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L8 21l4.25-2.25L16.5 21l-1.75-4
                     3.75-3.5h-4.5L12 9l-1.5 4.5H6l3.75 3.5z" />
          </svg>
          <span
            class="text-sm font-medium text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
            Histórico
          </span>
        </a>

        <!-- Notificações -->
        <a href="#" class="flex flex-col items-center w-full hover:bg-cyan-300/40 p-2 rounded transition">
          <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0
                     0118 14.158V13a6.002 6.002 0 00-4-5.659V7a2
                     2 0 10-4 0v.341C7.67 8.165 6 10.388 6
                     13v1.159c0 .538-.214 1.055-.595 1.436L4
                     17h5m6 0v1a3 3 0 11-6 0v-1h6z" />
          </svg>
          <span
            class="text-sm font-medium text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
            Notificações
          </span>
        </a>

      </nav>

      <!-- USUÁRIO -->
      <div class="flex flex-col items-center w-full mt-6">
        <a href="#" class="flex flex-col items-center w-full hover:bg-cyan-300/30 p-2 rounded transition">
          <svg class="h-6 w-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6 6 0 0012 21a6 6 0
                     006.879-3.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span
            class="text-sm font-medium text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
            Usuário
          </span>
        </a>
      </div>

    </aside>


    <!-- CONTEÚDO -->
    <main class=" w-full transition-all duration-300">
      @yield('content')
    </main>

  </div>
</body>

</html>