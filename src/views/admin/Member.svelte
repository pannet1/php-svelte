<script>  
  import TableTitle from "components/Cards/TableTitle.svelte";  
  import TableHead from "components/Cards/TableHead.svelte";
  import TableData from "components/Cards/TableData.svelte";  
  import TableDropdown from "components/Dropdowns/TableDropdown.svelte";  

  import { navigate } from "svelte-routing";   
  import { onMount } from "svelte";
  import { modValById, getMemberList } from "../../services/kkk";  
  import { ts2dt} from "../../services/utils";

  let members;

  // Get the data from the api, after the page is mounted.
   onMount(async () => {
    const res = await getMemberList();
    members = res;        
  });

    const toggle = async (e, val, id) => {    
    e.preventDefault();   
    const args = 'name=member&id='+id+'&col=status_id&val='+val    
    const res  =  await modValById(args);
    if(res.status==true)
      navigate("/", { replace: true }) 
  }

  // can be one of light or dark
  let color = "light";
</script>
<div class="flex flex-wrap mt-4">
  <div class="w-full mb-12 px-4">
    <div
    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded {color === 'light' ? 'bg-white' : 'bg-red-800 text-white'}"
    >    
      <TableTitle>Members</TableTitle>
      {#if members }
      <div class="block w-full overflow-x-auto">  
        <table class="items-center w-full bg-transparent border-collapse">
          <thead>        
            <tr>          
              <TableHead>Name</TableHead>
              <TableHead>Email</TableHead>       
              <TableHead>Join Date</TableHead>
              <TableHead>Status</TableHead>                              
              <TableHead>Action</TableHead>                
            </tr>       
          </thead>
          <tbody>
            {#each members as member }
            <tr>          
              <TableData>
                { member.first+' '+member.middle+' '+member.last}
              </TableData>                
              <TableData>{ member.email}</TableData>      
              <TableData>{ ts2dt(member.join_date) }</TableData>    
              <TableData>
                {#if member.status_id >= 2 }                
                <i class="fas fa-circle mr-2 text-teal-500"></i>active
                {:else}
                <i class="fas fa-circle mr-2 text-red-500"></i>inactive                
                {/if}
              </TableData>                  
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
              > 
              <TableDropdown>
                <a
                href="#pablo" 
                on:click="{ (e)=> toggle(e, 3, member.id) }"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                >
                  Approve
                </a>
               <a
                href="#pablo" 
                on:click="{ (e)=> toggle(e, 0, member.id) }"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
              >
                  Reject
              </a>                      
              </TableDropdown>
              </td>
            </tr>
            {/each}          
          </tbody>
        </table>
      </div>
    {:else}
      <p class="loading">loading...</p>
    {/if}
    </div>    
  </div>  
</div>
