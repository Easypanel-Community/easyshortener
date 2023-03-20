<!--  Success -->
<div x-data="{ show: false, message: '', type: '' }"
    @notification-show.window="console.log(event); show=true; message=event.detail.message; type=event.detail.type"
    x-init="$watch('show', function(value){ if(value){ setTimeout(function(){ show=false; }, 4000); }})"
    class="fixed top-0 right-0 w-full sm:max-w-xs" x-cloak>
    <div x-show="show"
        x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="relative z-50 flex items-center p-4 mt-2 mr-2 bg-white border border-gray-100 rounded-lg shadow">

        <svg x-show="type=='success'" class="w-8 h-8 mr-2 text-green-400 stroke-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <svg x-show="type=='info'" class="w-8 h-8 mr-2 text-blue-400 stroke-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <svg x-show="type=='warning'" class="w-8 h-8 mr-2 text-yellow-400 stroke-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
        <svg x-show="type=='error'" class="w-8 h-8 mr-2 text-red-400 stroke-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>

        <div>
            <h4 class="text-sm font-semibold text-gray-700">
                <span x-show="type=='success'">Success</span>
                <span x-show="type=='info'">Notice</span>
                <span x-show="type=='warning'">Warning</span>
                <span x-show="type=='error'">Error</span>
            </h4>
            <p class="text-xs text-gray-400" x-text="message"></p>
        </div>
        <div @click="show=false;" class="absolute top-0 right-0 p-2.5 text-gray-400 hover:text-gray-500 cursor-pointer">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </div>
    </div>
</div>