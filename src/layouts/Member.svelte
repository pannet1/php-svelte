<script>
  import { Router, Route } from "svelte-routing";

  // components for this layout
  import Navbar from "components/Navbars/Member.svelte";
  import Sidebar from "components/Sidebars/Member.svelte";
  import HeaderStats from "components/Headers/HeaderStats.svelte";
  import Footer from "components/Footers/Member.svelte";

  // pages for this layout  
  import Settings from "views/admin/Settings.svelte";
  import Member from "views/admin/Member.svelte";    
</script>

<div>
  <Sidebar location={location}/>
  <div class="relative md:ml-64 bg-blueGray-100">
    <Navbar />
    <HeaderStats />
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
      <Router url="admin">        
        <Route path="settings" component="{Settings}" />
        <Route path="member" component="{Member}" />        
      </Router>
      <Footer />
    </div>
  </div>
</div>
