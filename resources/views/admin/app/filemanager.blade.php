@extends('admin.master')

@section('content')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        var elf = $('#elfinder').elfinder({
            // lang: 'ru',             // language (OPTIONAL)
            url : '{!! asset("public/elfinder") !!}php/connector.php'  // connector URL (REQUIRED)
        }).elfinder('instance');            
    });
</script>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>


@endsection
