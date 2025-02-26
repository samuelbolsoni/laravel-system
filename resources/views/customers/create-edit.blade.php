@extends ('layouts.dashboard')
@section('page_heading',Lang::get('translations.add_customer'))

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
        @if (isset($customer->id))
            <form role="form" method="post" action="/customers/{{$customer->id}}">
            <input name="_method" value="PUT" type="hidden">
        @else
            <form role="form" method="post" action="/customers">
        @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label>{{Lang::get('translations.name')}}</label>
                <input name="name" id="name" class="form-control" placeholder="{{Lang::get('translations.inform_name')}}" value="@if(isset($customer->name)){{$customer->name}}@else{{old('name')}}@endif" required>
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.address')}}</label>
                <input name="address" id="address" class="form-control" placeholder="{{Lang::get('translations.address')}}" value="@if(isset($customer->address)){{$customer->address}}@else{{old('address')}}@endif">
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.district')}}</label>
                <input name="district" id="district" class="form-control" placeholder="{{Lang::get('translations.district')}}" value="@if(isset($customer->district)){{$customer->district}}@else{{old('district')}}@endif">
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.city')}}</label>
                <input name="city" id="city" class="form-control" placeholder="{{Lang::get('translations.city')}}" value="@if(isset($customer->city)){{$customer->city}}@else{{'Caxias do Sul'}}@endif">
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.reference')}}</label>
                <textarea name="reference" id="reference" class="form-control" rows="3">@if(isset($customer->reference)){{$customer->reference}}@else{{old('reference')}}@endif</textarea>
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.email')}}</label>
                <input name="email" id="email" class="form-control" type="email" placeholder="{{Lang::get('translations.email')}}" value="@if(isset($customer->email)){{$customer->email}}@else{{old('email')}}@endif">
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.phone')}}</label>
                <input name="phone" id="phone" class="form-control" placeholder="{{Lang::get('translations.phone')}}" value="@if(isset($customer->phone)){{$customer->phone}}@else{{old('phone')}}@endif">
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.cellphone')}}</label>
                <input name="cellphone" id="cellphone" class="form-control" placeholder="{{Lang::get('translations.cellphone')}}" value="@if(isset($customer->cellphone)){{$customer->cellphone}}@else{{old('cellphone')}}@endif">
            </div>
            <div class="form-group">
                <label>{{Lang::get('translations.whatsapp')}}</label>
                <input name="whatsapp" id="whatsapp" class="form-control" placeholder="{{Lang::get('translations.whatsapp')}}" value="@if(isset($customer->whatsapp)){{$customer->whatsapp}}@else{{old('whatsapp')}}@endif">
            </div>

            <select class="js-example-basic-single" name="state">
              <option value="AL">Alabama</option>
                ...
              <option value="WY">Wyoming</option>
            </select>

            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{Lang::get('translations.cadastrar')}}</button>
                <a href="{{ url('/customers/') }}">
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