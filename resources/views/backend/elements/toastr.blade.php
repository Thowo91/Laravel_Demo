<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script>
    $(document).ready(function() {

        @if($errors->any()) {
            @foreach($errors->all() as $error) {
                toastr.error("{{ $error }}");
            }
            @endforeach
        }
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        {!! \App\Helpers\ToastrHelper::renderToast() !!}
    });

</script>
