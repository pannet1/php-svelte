<script>    
    import { onMount } from "svelte";
    import { getTest } from "../../services/kkk";      

  
let sex_checks = []
  // Get the data from the api, after the page is mounted.
   onMount(async () => {
    console.log('successfully loaded');
    const res = await getTest();
    sex_checks = res;    
    console.log("res"+res);
  });
 
</script>  
  
<div>
<h1>Test</h1>
{#if sex_checks }
<form action="">
    {#each sex_checks as check}
    <input type="radio" name="sex_id" value={check.id}> 
    <label for="female">{check.value}</label>
    {/each}
</form>
{:else}
  <p class="loading">loading...</p>
{/if}
</div>
  
  