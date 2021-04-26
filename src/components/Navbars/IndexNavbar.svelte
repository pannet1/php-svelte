<script>
  import { link } from "svelte-routing";
 

  let navbarOpen = false;

  function setNavbarOpen() {
    navbarOpen = !navbarOpen;
  }
</script>

<nav
  class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-white shadow"
>
  <div
    class="container px-4 mx-auto flex flex-wrap items-center justify-between"
  >
    <div
      class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
    >
      <a
        use:link
        class="text-blueGray-700 text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase"
        href="/"
      >
        Kuwait Kannada Koota
      </a>
      <button
        class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
        type="button"
        on:click="{setNavbarOpen}"
      >
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <div
      class="lg:flex flex-grow items-center {navbarOpen ? 'block':'hidden'}"
      id="example-navbar-warning"
    >
      <ul class="flex flex-col lg:flex-row list-none mr-auto">
        <li class="flex items-center">
          <a          
            use:link          
            class="hover:text-blueGray-500 text-blueGray-700 px-3 py-2 flex items-center text-xs uppercase font-bold"            
            href="/admin/dashboard"
          >
            
          <i class="text-blueGray-400 fas fa-chart-pie text-lg leading-lg mr-2" />
            Dashboard
          </a>
        </li>
      </ul>

      <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">

        <li class="flex items-center">
          <a
            use:link          
            class="hover:text-blueGray-500 text-blueGray-700 px-3 py-2 flex items-center text-xs uppercase font-bold"
            href="/auth/test"
          >  
          <i class="text-blueGray-400 fas fa-lock text-lg leading-lg mr-2" />          
            Test
          </a>
        </li>
        
        <li class="flex items-center">
          <a
            use:link          
            class="hover:text-blueGray-500 text-blueGray-700 px-3 py-2 flex items-center text-xs uppercase font-bold"
            href="/auth/register"
          >  
          <i class="text-blueGray-400 fas fa-lock text-lg leading-lg mr-2" />          
            Register
          </a>
        </li>

        <li class="flex items-center">
          <a
          use:link     
            class="bg-red-400 text-white active:bg-red-500 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
            href="/auth/login"
          >          
          <i class="fa fa-sign-in-alt"></i>&nbsp; Login
        </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
