@extends ('layouts.dashboard')
@section('page_heading',Lang::get('translations.add_pizza'))

@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-12">
        @if(isset($message) && $message != '')
            <div class="alert alert-success " role="alert">
                <i class="fa fa-info"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$message}}
            </div>
        <h4></h4>
        @endif
        @if (isset($pizza->id))
            <form role="form" method="post" action="/pizzas/{{$pizza->id}}">
            <input name="_method" value="PUT" type="hidden">
        @else
            <form role="form" method="post" action="/pizzas">
        @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label>{{Lang::get('translations.name')}}</label>
                <input name="name" id="name" class="form-control" placeholder="{{Lang::get('translations.inform_pizza_flavor')}}" value="@if(isset($pizza->name)){{$pizza->name}}@else{{old('name')}}@endif" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{Lang::get('translations.cadastrar')}}</button>
                <a href="{{ url('/pizzas/') }}">
                    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> {{Lang::get('translations.cancelar')}}</button>
                </a>
            </div>
        </form>
    </div>
</div>
@stop

<script src="{{ asset("assets/plugins/jquery/dist/jquery.min.js") }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>