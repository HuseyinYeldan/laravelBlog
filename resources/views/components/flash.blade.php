@if(session()->has('success'))
<div x-data="{show:true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bg-blue-400 px-12 py-6 animation-success-message rounded-xl right-10 bottom-10">
    <p class="text-white font-semibold">{{ session('success') }}</p>
</div>
@endif