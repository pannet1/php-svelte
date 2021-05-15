<script>
  // library for creating dropdown menu appear on click
  import { createPopper } from "@popperjs/core";
  import { modValById } from "../../services/kkk";
    
  // core components
  let dropdownPopoverShow = false;
  let btnDropdownRef;
  let popoverDropdownRef;

  const toggleDropdown = (event) => {
    event.preventDefault();
    if (dropdownPopoverShow) {
      dropdownPopoverShow = false;
    } else {

      dropdownPopoverShow = true;
      createPopper(btnDropdownRef, popoverDropdownRef, {
        placement: "bottom-start",
      });
    }
  };

  async function toggle (val)  {
    console.log(val);
    const args = 'mod=member&id=1&col=status_id&val='+val
    const res = await modValById(args);
    console.log(res)
  }

</script>

<div>
  <a
    class="text-blueGray-500 py-1 px-3"
    href="#pablo"
    bind:this="{btnDropdownRef}"
    on:click="{toggleDropdown}"
  >
    <i class="fas fa-ellipsis-v"></i>
  </a>
  <div
    bind:this="{popoverDropdownRef}"
    class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 {dropdownPopoverShow ? 'block':'hidden'}"
  >
    <button
      on:click={toggle(4) }
      type="button"
      class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
    >
      Approve
  </button>

    <a
      href="#pablo" on:click={(e) => e.preventDefault()}
      class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
    >
      Reject
    </a>

    
    
  </div>
</div>
