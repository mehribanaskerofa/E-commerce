@push('js')
    <script src="{{asset('_assets/js/select2.full.js')}}"></script>
    <script>
        $('#select2').select2();
    </script>
@endpush
@push('css')
    <link  media="all" type="text/css" rel="stylesheets" href="{{asset('_assets/css/select2.css')}}"  ></link>
@endpush
