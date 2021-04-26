<script>
  // core components  
  import { onMount } from "svelte";
  import { getMember } from "../../services/kkk";
  import { link, navigate  } from "svelte-routing";
  import { postAddr } from "../../services/kkk";


  const team2 = "/assets/img/team-1-800x800.jpg";
  
  let member;
  
   // Get the data from the api, after the page is mounted.
   onMount(async () => {
      const res = await getMember(1);
      member = res;        
  });
  
  function fullname(first,middle,last) {
    let name='';
    if(first){name=first}
    if(middle){name += ' '+middle}
    if(last) {name += ' '+last}
    return name;
  }

function _setError(message) {
    console.log("something bad happened")    
}

async function submitForm() {
    const form = document.querySelector('form');
    const formData = new FormData(form);
    const res = await postAddr(formData);
    console.log(formData);
    if(res.error)
        _setError(res.error)
    else if(res.data)
        navigate("/", {replace:true})    
}

  </script>

<div class="flex flex-wrap">
  {#if member }
  <div class="w-full lg:w-8/12 px-4">

  <!-- settings -->
  <div
  class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
  >

  <div class="rounded-t bg-white mb-0 px-6 py-6">
    <div class="text-center flex justify-between">
      <h6 class="text-blueGray-700 text-xl font-bold">My account</h6>
      <button
        class="bg-red-400 text-white active:bg-red-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
        type="button" 
        on:click={submitForm}
      >
        Profile
      </button>
    </div>
  </div>
  <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
    <form>
      <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Address
      </h6>
      <div class="flex flex-wrap">
        <div class="w-full lg:w-12/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="addr_1"
            >
              Line 1
            </label>
            <input
              name="addr_1"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value={ member.addr_1}
            />
          </div>
        </div>
        <div class="w-full lg:w-12/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="addr2"
            >
              Line 2
            </label>
            <input
              name="addr2"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value={ member.addr_2}
            />
          </div>
        </div>

        <div class="w-full lg:w-4/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
             for="city"
            >
              City/Town
            </label>
            <input
              name="city"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value={ member.city }
            />
          </div>
        </div>
        <div class="w-full lg:w-4/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="addr_country_id"
            >
              Country
            </label>
            <input
              name="addr_country_id"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value="Kuwait"
            />
          </div>
        </div>
        <div class="w-full lg:w-4/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="postal_code"
            >
              Postal Code
            </label>
            <input
              name="postal_code"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value={member.postal_code}
            />
          </div>
        </div>
      </div>
      <hr class="mt-6 border-b-1 border-blueGray-300" />

      <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        Reference
      </h6>
      <div class="flex flex-wrap">
        <div class="w-full lg:w-6/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="ref1"
            >
              Reference 1
            </label>
            <input
              name="ref1"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value={ member.ref1}
            />
          </div>
        </div>
        <div class="w-full lg:w-6/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="ref2"
            >
              Reference 2
            </label>
            <input
              name="ref2"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              value={ member.ref2}
            />
          </div>
        </div>        
      </div>
      <hr class="mt-6 border-b-1 border-blueGray-300" />

      <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        About Me
      </h6>
      <div class="flex flex-wrap">
        <div class="w-full lg:w-12/12 px-4">
          <div class="relative w-full mb-3">
            <label
              class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              for="notes"
            >
              About me
            </label>
            <textarea
              name="notes"
              type="text"
              class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
              rows="4">{member.notes}
            </textarea>
          </div>
        </div>
      </div>
      <input type="hidden" name="people_id" value={member.people_id} />
      <input type="hidden" name="member_id" value={member.id} />
      <button
        class="bg-red-400 text-white active:bg-red-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
        type="button" 
        on:click={submitForm}
      >
        Submit
      </button>

    </form>
  </div>

</div>
<!-- end of settings -->
  </div>
  <div class="w-full lg:w-4/12 px-4">
<!-- profile -->
<div
class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16"
>
<div class="px-6">
  <div class="flex flex-wrap justify-center">
    <div class="w-full px-4 flex justify-center">
      <div class="relative">
        <img
          alt="..."
          src="{team2}"
          class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
        />
      </div>
    </div>    
  </div>  
  <div class="text-center mt-32">
    <h3 class="text-xl font-semibold leading-normaltext-blueGray-700 mb-2">
      {fullname(member.first,member.middle,member.last)}
    </h3>
    <div
      class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase"
    >
      <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
      { member.city }, Kuwait
    </div>
    <div class="mb-2 text-blueGray-600 mt-0">
      <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
      {member.type_id}
    </div>    
  </div>
  <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
    <div class="flex flex-wrap justify-center">
      <div class="w-full lg:w-9/12 px-4">
        <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
          {member.notes}
        </p>        
      </div>
    </div>
  </div>
</div>
</div>

    

  </div>
  {/if}
</div>
