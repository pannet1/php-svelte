<script>
  import { link } from "svelte-routing";
  // make dynamic date to be added to footer
  let date = new Date().getFullYear();

  export let absolute = false;
</script>

<footer
  class="pb-6 {absolute ? 'absolute w-full bottom-0 bg-blueGray-800' : 'relative'}"
>
  <div class="container mx-auto px-4">
    <hr class="mb-6 border-b-1 border-blueGray-600" />
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-4/12 px-4">
        <div
          class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left"
        >
          Copyright © {date}
          <a
            use:link
            href="/"
            class="text-white hover:text-blueGray-300 text-sm font-semibold py-1"
          >
            Kuwait Kannada Koota
          </a>
        </div>
      </div>
      <div class="w-full md:w-8/12 px-4">
        <ul class="flex flex-wrap list-none md:justify-end justify-center">
          <li>
            <a
              href="https://www.creative-tim.com?ref=ns-footer-small"
              class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
            >
              AUTOMAT
            </a>
          </li>
          <li>
            <a
              href="https://www.creative-tim.com/presentation?ref=ns-footer-small"
              class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
            >
              Automation
            </a>
          </li>
          <li>
            <a
            href="http://automat.com"
              class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
            >
              ERP
            </a>
          </li>
          <li>
            <a
            href="http://automat.com"
              class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
            >
              Web
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
