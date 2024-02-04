<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    function display_message(type, msg) {

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-left",
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
        };
        if (type == 'error') {
            toastr.error(msg);
        } else {
            toastr.success(msg);
        }

    }
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2({theme: 'bootstrap5 '});

    });
</script>

<script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    @if (Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif
    @if (Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif
    @if (Session::has('errors'))
    toastr.error("{{ Session::get('errors') }}");
    @endif
</script>
@yield('script')
@stack('script')
