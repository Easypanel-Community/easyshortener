<script>
    let secondTick = false;
    // this function relies on the "secondTick" flag, set above
    function DisplayCurrentTime() {
        let date = new Date();
        let hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        let am_pm = date.getHours() >= 12 ? "PM" : "AM";
        let minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        let secondDelimiter = (secondTick) ? '<span class="text-gray-700">:</span>' : ':';
        secondTick = !secondTick;
        document.getElementById('time').innerHTML = hours + secondDelimiter + minutes + " " + am_pm;
        let time = setTimeout(DisplayCurrentTime, 500);
    };

    function DisplayCurrentDate() {
        let now = new Date();
        let days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        let dayOfWeek = days[ now.getDay() ];
        let month = months[ now.getMonth() ];
        let day = now.getDate();
        let year = now.getFullYear();
        document.getElementById('date').innerHTML = dayOfWeek + ", " + month + " " + day + " " + year;
        let time = setTimeout(DisplayCurrentDate, 500);
    }

    if( document.getElementById('time') ) {
        DisplayCurrentTime();
    }

    if( document.getElementById('date') ) {
        DisplayCurrentDate();
    }

    window.addEventListener('set-url', function(event){
        history.pushState({}, '', event.detail.url);
    });

    window.notification = {
        show: function(type, message){
            window.dispatchEvent(new CustomEvent('notification-show', { detail : { type: type, message: message }}));
        }
    }

</script>