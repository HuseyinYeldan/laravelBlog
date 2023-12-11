@if(session()->has('error'))
<div x-data="{show:true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bg-red-400 px-12 py-6 animation-success-message rounded-xl right-10 bottom-10">
    <p class="text-white font-semibold">{{ session('error') }}</p>
</div>
@endif