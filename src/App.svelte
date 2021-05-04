<script>
  import { Router, Route } from "svelte-routing";  
 
  import Admin from "./layouts/Member.svelte";    
 // import Auth from "./layouts/Auth.svelte";
 
  import Index from "./views/Index.svelte";
  

export let url = "";
</script>


<Router url="{url}">  
  <Route path="admin/*admin" component="{Admin}" />      
  <!-- auth layout -->
  <!--Route path="auth/*auth" component="{Auth}" /-->  
  <Route path="/" component="{Index}" />
</Router>
