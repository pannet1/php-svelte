<script>
  import { link } from "svelte-routing";

  // core components
  import IndexNavbar from "components/Navbars/IndexNavbar.svelte";
  import Footer from "components/Footers/Footer.svelte";

  const patternVue = "app/ui/assets/img/pattern_svelte.png";
  
</script>

<IndexNavbar />
<section class="header relative pt-16 items-center flex h-screen max-h-860-px">
  <div class="container mx-auto items-center flex flex-wrap">
    <div class="w-full md:w-8/12 lg:w-6/12 xl:w-6/12 px-4">
      <div class="pt-32 sm:pt-0">
        <h2 class="font-semibold text-4xl text-blueGray-600">
          Participate
        </h2>
        <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
          Kuwait Kannada Koota is a non-profit socio-cultural organization 
 registered with the Indian Embassy Kuwait. It is the pioneer Kannada association in Kuwait founded in the year 1984, and now considered as one of the premier associations in Kuwait. The Koota comprises of Kannada speaking people as its members, with representation from all parts of the State of Karnataka, India. 

        </p>
        <div class="mt-12">
          <a
            use:link
            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-red-400 active:bg-red-500 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
            href="/auth/register"            
          >
            Membership
          </a>
          <a
            use:link
            href="/"
            class="github-star ml-1 text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"            
          >
            Volunteer
          </a>
        </div>
      </div>
    </div>
  </div>

  <img
    class="absolute top-0 b-auto right-0 pt-16 sm:w-6/12 -mt-48 sm:mt-0 w-10/12 max-h-860-px"
    src="{patternVue}"
    alt="..."
  />
</section>

<section class="mt-48 md:mt-40 pb-40 relative bg-blueGray-100">
  <div
    class="-mt-20 top-0 bottom-auto left-0 right-0 w-full absolute h-20"
    style="transform: translateZ(0);"
  >
    <svg
      class="absolute bottom-0 overflow-hidden"
      xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="none"
      version="1.1"
      viewBox="0 0 2560 100"
      x="0"
      y="0"
    >
      <polygon
        class="text-blueGray-100 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>
  <div class="container mx-auto">
    <div class="flex flex-wrap items-center">
      <div
        class="w-10/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-32"
      >
        <div
          class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-red-400"
        >
          <img
            alt="..."                        
            src="https://source.unsplash.com/_HzlOHmboSk/1600x900"
            class="w-full align-middle rounded-t-lg"
          />
          <blockquote class="relative p-8 mb-4">
            <svg
              preserveAspectRatio="none"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 583 95"
              class="absolute left-0 w-full block h-95-px -top-94-px"
            >
              <polygon
                points="-30,95 583,95 583,65"
                class="text-red-400 fill-current"
              ></polygon>
            </svg>
            <h4 class="text-xl font-bold text-white">
              Objectives of Koota
            </h4>
            <p class="text-md font-light mt-2 text-white">
              The objectives of the Kuwait Kannada Koota have been to promote Karnataka culture in spheres of music, dance, drama and all other forms of art which help the Kannada community to retain their rich heritage and culture.
            </p>
          </blockquote>
        </div>
      </div>           

    </div>
  </div>    
</section>

<section class="py-20 bg-blueGray-600 overflow-hidden">
  <div class="container mx-auto pb-64">
    <div class="flex flex-wrap justify-center">
      <div class="w-full md:w-5/12 px-12 md:px-4 ml-auto mr-auto md:mt-64">
        <div
          class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white"
        >
          <i class="fas fa-id-card text-xl"></i>
        </div>
        <h3 class="text-3xl mb-2 font-semibold leading-normal text-white">          
        KKK Welfare Association
        </h3>
        <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-blueGray-400">
          since 
          <a
            use:link
            href="https://www.kkkwa.org/"
            class="text-blueGray-300"
            target="_blank"
          >
          it’s 
          </a>
          inception, when it started with few families, gathering together on prominent Karnataka festivals. The intent was to have our coming generations get a taste of our rich culture, heritage and tradition while growing up away from home. I have seen this small association of few Kannada speaking people grow to be one of the leading associations in Kuwait with great camaraderie amongst many Kannada speaking families as its members.
        </p>
        
        <a
          use:link
          href="/auth/register"          
          class="github-star mt-4 inline-block text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
        >
          Membership
        </a>
      </div>

      <div class="w-full md:w-4/12 px-4 mr-auto ml-auto mt-32 relative">
        <i
          class="fa fa-id-card text-blueGray-700 text-55 absolute -top-150-px -right-100 left-auto opacity-80"
        ></i>
      </div>
    </div>
  </div>
</section>

<section class="pb-16 bg-blueGray-200 relative pt-32">
  <div
    class="-mt-20 top-0 bottom-auto left-0 right-0 w-full absolute h-20"
    style="transform: translateZ(0);"
  >
    <svg
      class="absolute bottom-0 overflow-hidden"
      xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="none"
      version="1.1"
      viewBox="0 0 2560 100"
      x="0"
      y="0"
    >
      <polygon
        class="text-blueGray-200 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>

  <div class="container mx-auto">
    <div
      class="flex flex-wrap justify-center bg-white shadow-xl rounded-lg -mt-64 py-16 px-12 relative z-10"
    >
      <div class="w-full text-center lg:w-8/12">        
        <h3 class="font-semibold text-3xl">
          Wish to join the club ?
        </h3>
        <p class="text-blueGray-500 text-lg leading-relaxed mt-4 mb-4">
          Cause if you do, you can become part of it. Hit the buttons below to
          volunteer the next event. Become a member and enjoy the benefits and
          bring freshness to your life!
        </p>
        <div class="sm:block flex flex-col mt-10">
          <a
            use:link
            href="/auth/register"            
            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-2 bg-red-400 active:bg-red-500 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
          >
          <i class="fa fa-id-card text-lg mr-1"></i>  
          <span>Membership</span>  
          </a>
          <a
            use:link
            href="/"            
            class="github-star sm:ml-1 text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
          >
            <i class="fa fa-heart text-lg mr-1"></i>
            <span>volunteer</span>
          </a>
        </div>
        <div class="text-center mt-16"></div>
      </div>
    </div>
  </div>
</section>
<Footer />
