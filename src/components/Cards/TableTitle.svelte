<script>
let color = "light";
</script>

<div class="rounded-t mb-0 px-4 py-3 border-0">
  <div class="flex flex-wrap items-center">
    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
      <h3
        class="font-semibold text-lg {color === 'light' ? 'text-blueGray-700' : 'text-white'}"
      >
        <slot>
          
        </slot>
      </h3>
    </div>
  </div>
</div>