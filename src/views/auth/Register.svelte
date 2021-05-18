<script> 
  import { link, navigate } from "svelte-routing";   
  import { postMember } from "../../services/kkk";  

  function _setError(message) {
    document.getElementById('error').textContent = message;  
  }  
  
  async function register() {
    const form = document.querySelector('form');
    const formData = new FormData(form);    
    const res = await postMember(formData);      
    
     for (let key of formData.keys()){
     console.log(key, formData.get(key));
    }


    if(res.error)
     _setError(res.error)     
    else if(res.data)      
      navigate("/", { replace: true }) 
  }  
  
</script>      
<div class="container mx-auto px-4 h-full">
  <div class="flex content-center items-center justify-center h-full">
    <div class="w-full lg:w-6/12 px-4">
      <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
      >
        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-blueGray-500 text-sm font-bold">
              Sign up
            </h6>
          </div>

          <div class="text-center mb-3">            
            <h6 id="error" class="text-red-500 text-sm font-bold">             
            </h6>
          </div>
          
          <hr class="mt-6 border-b-1 border-blueGray-300" />
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">          
          <form>
            <div class="relative w-full mb-3">
              <label
                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                for="fullname"
              >
                Fullname (Title First Middle Last)
              </label>
              <input
                
                type="text"
                name="fullname"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="Mr. Karnataka"
              />
            </div>      

            <div class="relative w-full mb-3">
              <label
                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                for="sex_id"
              >
                Sex
              </label>
              <input type="radio" name="sex_id" value="1" 
              class="form-radio border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />              
              <label for="male">Male</label>&nbsp;
              <input type="radio" name="sex_id" value="2" 
              class="form-radio border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />              
              <label for="female">Female</label>            
            </div>

            <div class="relative w-full mb-3">
              <label
                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                for="email"
              >
                Email
              </label>
              <input                
                type="text"
                name="email"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="Email"
              />
            </div>

            <div class="relative w-full mb-3">
              <label
                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                for="marital_status_id"
              >
                Marital Status
              </label>
              <input type="radio" name="marital_status_id" value="1" 
              class="form-radio border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />              
              <label for="Single">Single</label>&nbsp;
              <input type="radio" name="marital_status_id" value="2" 
              class="form-radio border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />              
              <label for="Married">Married</label>
            </div>

            <div class="relative w-full mb-3">
              <label
                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                for="password"
              >
                Password
              </label>
              <input              
                type="password"
                name="password"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="Password"
              />
            </div>           

            <div class="text-center mt-6">
              <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="button"
                on:click={register}
              >
                Create Account
              </button>
            </div>            

          </form>
        </div>
      </div>

      <div class="flex flex-wrap mt-6 relative">
        <div class="w-1/2">
          <a use:link href="/" on:click={(e) => e.preventDefault()} class="text-blueGray-200">
            <small>Forgot password?</small>
          </a>
        </div>
        <div class="w-1/2 text-right">
          <a use:link href="/auth/login" class="text-blueGray-200">
            <small>Login</small>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
