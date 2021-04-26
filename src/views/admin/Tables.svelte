<script>  
  import TableTitle from "components/Cards/TableTitle.svelte";  
  import TableHead from "components/Cards/TableHead.svelte";
  import TableData from "components/Cards/TableData.svelte";  
  import TableDropdown from "components/Dropdowns/TableDropdown.svelte";  

  import { onMount } from "svelte";
  import { getMemberList } from "../../services/kkk";

  let members;

  // Get the data from the api, after the page is mounted.
   onMount(async () => {
    const res = await getMemberList();
    members = res.data;        
  });

  function ts2dt(ts) {        
    const date = new Date(ts);    
    return (date.getDate()+
          "/"+(date.getMonth()+1)+
          "/"+date.getFullYear());    
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
                {#if member.status_id == "0" }
                <i class="fas fa-circle mr-2 text-red-500"></i>inactive
                {:else}
                <i class="fas fa-circle mr-2 text-teal-500"></i>active
                {/if}
              </TableData>        
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
              > 
              <TableDropdown />
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
