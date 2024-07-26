<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
  @vite('resources/css/app.css')
  <style>
    .with-line{
      transition: width 0.5s;
      width: 23px
    }
    .transition-width {
      transition: width 0.5s;
    }
    .hide-text {
      display: none;
    }
  </style>
</head>
{{--Navigasi Dashboard---}}
      <body class="flex bg-back2">
        <aside id="sidebar" class="w-64 sticky top-0 h-screen bg-vab rounded-r-lg transition-all duration-300">
          <div class="flex mb-7 relative ring-2 ring-slate-500 hover:bg-white transition-all duration-500 items-start rounded-r-lg justify-start w-auto h-auto group ">
            <button id="toggleButton" class="w-6 h-6 rounded-full bg-sky-500 absolute -right-8 mr-5 mt-5 animate-pulse">
              <span class="relative flex items-center justify-center">
                <div id="line" class="line w-0 h-0.5  absolute hidden rounded-sm rotate-45 bg-black transition-all duration-500 "></div>
                <img id="toggleIcon" class=" relative w-6 h-6 rounded-full" src="https://img.icons8.com/material-outlined/48/visible--v1.png" alt="logo">
              </span>
            </button>
            <div class="w-full rounded-r-lg h-16  justify-start flex items-center pl-2  transition-all duration-300">
              <img src="{{$user->profile ? asset('storage/'.$user->profile ):asset('images/user.png')}}" alt="logo" class="w-12 h-12 rounded-xl ring-slate-400 ring-offset-2 ring">
              <div class="flex flex-col w-auto h-auto">
                <p class="text-white ml-3 text-base text-wrap group-hover:text-black" style="font-family: Poppins, sans-serif">{{ $user->nama}}</p>
                  <p class="text-white ml-3 text-base text-wrap group-hover:text-black" style="font-family: Poppins, sans-serif">{{$user->role}}</p>
                  </div>
                </div>
              </div>
                {{--Profile---}}
                <div class="flex group flex-col w-auto h-auto pt-3">
                  <a href="{{ route('profile') }}" id="profileLink" class="flex  items-center  rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800 hover:translate-x-3 focus:translate-x-3  transition-transform duration-300 active:translate-x-3 group-focus:translate-x-3 group-active:translate-x-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" class="fill-white stroke-none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-white ml-3 text-base text-wrap group-hover:text-white" style="font-family: Poppins, sans-serif" id="userText">Profile</p>
                  </a>
                </div>
                {{--Payment--}}
                @if($user->role=='fitnes')
                <a href="{{route('kelasku')}}" class="group">
                    <div class="flex items-center group  rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800  hover:translate-x-3 transition-all duration-300">
                      <svg width="24" height="24" viewBox="0 0 24 24" class="fill-white stroke-" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.72827 19.7C7.54827 18.82 8.79828 18.89 9.51828 19.85L10.5283 21.2C11.3383 22.27 12.6483 22.27 13.4583 21.2L14.4683 19.85C15.1883
                      18.89 16.4383 18.82 17.2583 19.7C19.0383 21.6 20.4883 20.97 20.4883 18.31V7.04C20.4883 3.01 19.5483 2 15.7683 2H8.20828C4.42828 2 3.48828 3.01 3.48828
                      7.04V18.3C3.49828 20.97 4.95827 21.59 6.72827 19.7Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M9.25 10H14.75" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      <p class="text-white ml-3 text-base text-wrap group-hover:text-white" style="font-family: Poppins, sans-serif" id="paymentText">My Kelas</p>
                      </div> 
                </a>
                @endif
                @if($user->role == 'admin')
                    {{--Dashboard---}}
                    <a href="{{ route('dashboard')}}" class="group">
                    <div class="flex items-center  rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800  hover:translate-x-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" class="fill-white stroke-black stroke-2" y="0px" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M 12 2 A 1 1 0 0 0 11.289062 2.296875 L 1.203125 11.097656 A 0.5 0.5 0 0 0 1 11.5 A 0.5 0.5 0 0 0 1.5 12 L 4 12 L 4 20 C 4 20.552 4.448 21 5
                            21 L 9 21 C 9.552 21 10 20.552 10 20 L 10 14 L 14 14 L 14 20 C 14 20.552 14.448 21 15 21 L 19 21 C 19.552 21 20 20.552 20 20 L 20 12 L 22.5 12 A 0.5 0.5
                            0 0 0 23 11.5 A 0.5 0.5 0 0 0 22.796875 11.097656 L 12.716797 2.3027344 A 1 1 0 0 0 12.710938 2.296875 A 1 1 0 0 0 12 2 z"></path>
                            </svg>
                            <p class="text-white ml-3 text-base text-wrap group-hover:text-white" style="font-family: Poppins, sans-serif" id="dashboardText">Dashboard</p>
                            </div>
                        </div>
                    </a>
                    {{--Instruktur--}}
                    <a href="{{ route('instructor.index')}}" class="group">
                                  <div class="flex items-center  rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800 hover:translate-x-3 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64.000000 64.000000" preserveAspectRatio="xMidYMid meet">
                                      <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                          <path d="M265 585 c-28 -27 -34 -82 -12 -104 10 -10 7 -16 -16 -33 -31 -23-57 -67 -57 -98 0 -18 -6 -20 -74 -20 -67 0 -75 -2 -81 -21-4 -11 -4 -31 -1 -45 5 -20 13 -24 41 -24 l34 0 3 -112 3 -113 220 0 220 0 3 113 3 112 34 0 c28 0 36 4 41 24 3 14 3 34 -1 45 -6 19 -14 21-81 21 -68 0 -74 2 -74 20 0 31 -26 75 -57 98 -23 17 -26 23 -15 33 6 7 12 28 12 46 0 47 -37 83 -85 83 -25 0 -44 -8 -60 -25z m99 -10 c43-43 20 -105 -39 -105 -26 0 -39 6 -51 25 -26 39 4 95 51 95 13 0 30 -7 39 -15z m46 -161 c16 -16 32 -41 35 -56 l7 -28 -127 0 -127 0 6 28 c4 15 21 41 39 58 29 26 39 30 86 28 44 -1 58 -6 81 -30z m190 -134 c0 -20 -7 -20 -275 -20 -268 0 -275 0 -275 20 0 20 7 20 275 20 268 0 275 0 275 -20z m-80 -140 l0 -100 -195 0 -195 0 0 25 c0 23 4 25 45 25 25 0 45 5 45 10 0 6 -20 10 -45 10 -41 0 -45 2 -45 25 0 24 2 25 64 25 35 0 71 3 80 6 34 13 2 24 -70 24 -72 0 -74 1 -74 25 l0 25 195 0 195 0 0 -100z"/>
                                      </g>
                                  </svg>
                            <p class="text-white ml-3 text-base text-wrap group-hover:text-white" style="font-family: Poppins, sans-serif" id="dashboardText">Instruktor</p>
                          </div>
                        </a>
                        {{--Kelas--}}
                        <a href="{{ route('fitnes.index')}}" class="group">
                                    <div class="flex items-center  rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800 hover:translate-x-3 transition-all duration-300">
                                        <svg fill="#000000" width="24" height="24" class="fill-white stroke-black" viewBox="-2 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg">
                                        <path d="M2.644 15.26a16.9 16.9 0 0 1-.706-.014l-.11-.025a1.51 1.51 0 0 1-1.14-1.185l-.018-.092c-.005-.106-.01-.406-.01-.667V4.434a.477.477 0 0 1
                                        .476-.475H11.77a.476.476 0 0 1 .475.475v1.529h1.591a.506.506 0 0 1 .504.504v7.192a1.6 1.6 0 0 1-1.6 1.6zm0-1.109h8.572a1.598
                                        1.598 0 0 1-.077-.491v-2.174a2.16 2.16 0 0 1-.003-.109v-6.31H1.769v8.21c0 .218.003.43.006.544l.002.008a.401.401 0 0 0
                                        .3.312l.01.002c.133.004.358.008.557.008zM9.91 6.815H2.95v1.109h6.96zm-4 2.383H2.95v3.532h2.96zm4.002.026H7.033v1.109h2.878zm0
                                    2.41H7.033v1.108h2.878zm2.336-4.563v6.589a.492.492 0 0 0 .984 0V7.07z"/>
                                    </svg>
                                <p class="text-white ml-3 text-base text-wrap group-hover:text-black" style="font-family: Poppins, sans-serif" id="newsText">Fitnes</p>
                            </div>
                            </a>
                        <a href="{{ route('kelas.index')}}" class="group">
                                    <div class="flex items-center  rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800 hover:translate-x-3 transition-all duration-300">
                                        <svg fill="#000000" width="24" height="24" class="fill-white stroke-black" viewBox="-2 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg">
                                        <path d="M2.644 15.26a16.9 16.9 0 0 1-.706-.014l-.11-.025a1.51 1.51 0 0 1-1.14-1.185l-.018-.092c-.005-.106-.01-.406-.01-.667V4.434a.477.477 0 0 1
                                        .476-.475H11.77a.476.476 0 0 1 .475.475v1.529h1.591a.506.506 0 0 1 .504.504v7.192a1.6 1.6 0 0 1-1.6 1.6zm0-1.109h8.572a1.598
                                        1.598 0 0 1-.077-.491v-2.174a2.16 2.16 0 0 1-.003-.109v-6.31H1.769v8.21c0 .218.003.43.006.544l.002.008a.401.401 0 0 0
                                        .3.312l.01.002c.133.004.358.008.557.008zM9.91 6.815H2.95v1.109h6.96zm-4 2.383H2.95v3.532h2.96zm4.002.026H7.033v1.109h2.878zm0
                                    2.41H7.033v1.108h2.878zm2.336-4.563v6.589a.492.492 0 0 0 .984 0V7.07z"/>
                                    </svg>
                                <p class="text-white ml-3 text-base text-wrap group-hover:text-black" style="font-family: Poppins, sans-serif" id="newsText">Kelas</p>
                            </div>
                            </a>
                            @endif
                          <a href="{{ route('logout')}}" class="w-auto h-auto border-t-4 group">
                          <div class="flex items-center rounded-3xl pl-6 justify-start w-auto h-14 group-hover:bg-gradient-to-r group-hover:from-black group-hover:to-red-800 hover:translate-x-3 transition-all duration-300">
                              <?xml version="1.0" standalone="no"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
                          "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                              width="24" height="24" viewBox="0 0 48.000000 48.000000"
                              preserveAspectRatio="xMidYMid meet">
                              <g transform="translate(0.000000,48.000000) scale(0.100000,-0.100000)"
                              fill="#000000" stroke="none">
                              <path d="M159 434 c-19 -23 -19 -119 1 -119 11 0 16 14 18 53 l3 52 100 0 99
                              0 0 -179 c0 -154 -2 -180 -16 -185 -22 -9 -157 -7 -171 2 -6 4 -13 30 -15 57
                              -2 36 -7 50 -18 50 -11 0 -15 -12 -15 -53 1 -79 14 -87 135 -87 139 0 134 -7
                            138 203 3 225 9 216 -134 220 -93 2 -113 0 -125 -14z"/>
                          <path d="M67 292 c-20 -21 -37 -45 -37 -53 0 -18 70 -89 88 -89 19 0 14 25 -9
                        46 -21 19 -21 19 47 24 41 3 69 10 72 18 3 9 -16 12 -74 12 l-78 0 27 28 c15
                      15 27 33 27 40 0 23 -26 12 -63 -26z"/>
                    </g>
                  </svg>
                <p class="text-white ml-3 text-base text-wrap group-hover:text-black" style="font-family: Poppins, sans-serif" id="newsText">logout</p>
              </div>
            </a>
            </div>
          </aside>
        <main class="w-full h-full ">
          @yield('content')
        </main>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
      document.getElementById('toggleButton').addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar');
        var texts = document.querySelectorAll('#sidebar p');
        var line = document.getElementById('line');
        if (sidebar.classList.contains('w-64')) {
          sidebar.classList.remove('w-64');
          sidebar.classList.add('w-16');
          line.classList.add('with-line');
          line.classList.remove('hidden');
          texts.forEach(function(text) {
            text.classList.add('hide-text');
          });
        } else {
          sidebar.classList.remove('w-16');
          sidebar.classList.add('w-64');
          line.classList.remove('with-line');
          line.classList.add('hidden');
          texts.forEach(function(text) {
            text.classList.remove('hide-text');
          });
        }
      });
        </script>
  </script>
</body>
</html>