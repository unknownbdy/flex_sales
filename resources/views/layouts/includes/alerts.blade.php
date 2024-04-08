 <script>
     @if (session('failed'))
         notifier.show('Sorry!', '{{ session('failed') }}', 'danger',
             '{{ asset('assets/images/notification/high_priority-48.png') }}', 4000);
     @endif

     @if (session('errors'))

     var response = '{!!session('errors')!!}';
     const jsonObject = JSON.parse(response);
    
     for (const key in jsonObject) {
        if (jsonObject.hasOwnProperty(key)) {
            const errors = jsonObject[key];
            console.log(`${key}:`);
            errors.forEach((error) => {
           
            notifier.show('Sorry!',   error  , 'danger',
             '{{ asset('assets/images/notification/high_priority-48.png') }}', 6000);
            });
        }
        }    




   
 
         
     @endif

     @if (session('success'))
         notifier.show('Success', '{{ session('success') }}', 'success',
             '{{ asset('assets/images/notification/ok-48.png') }}', 4000);
     @endif
     @if (session('successful'))
         notifier.show('Success', '{{ session('success') }}', 'success',
             '{{ asset('assets/images/notification/ok-48.png') }}', 4000);
     @endif

     @if (session('warning'))
         notifier.show('Warning!', '{{ session('warning') }}', 'warning',
             '{{ asset('assets/images/notification/medium_priority-48.png') }}', 4000);
     @endif

     @if (session('status'))
         notifier.show('Success', '{{ session('status') }}', 'info',
             '{{ asset('assets/images/notification/ok-48.png') }}', 4000);
     @endif

     $(document).on('click', '.delete-action', function() {
         var form_id = $(this).attr('data-form-id')
         $.confirm({
             title: '{{ __('Alert !') }}',
             content: '{{ __('Are You sure ?') }}',
             buttons: {
                 confirm: function() {
                     $("#" + form_id).submit();
                 },
                 cancel: function() {}
             }
         });
     });
 </script>
