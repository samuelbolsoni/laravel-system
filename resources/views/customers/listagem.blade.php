@extends('layouts.dashboard')
@section('page_heading',Lang::get('translations.customers'))

@section('section')
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            @section ('cotable_panel_title',Lang::get('translations.list_customers'))
            @section ('cotable_panel_body')

            <form role="search" method="post" action="{!! url('/customers/search') !!}">
                {!! csrf_field() !!}
                <label>{{Lang::get('translations.search_customers')}}</label>
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="search_customer" value="@if(isset($field_search)){{$field_search}}@endif">
                    <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{Lang::get('translations.name')}}</th>
                        <th>{{Lang::get('translations.address')}}</th>
                        <th>{{Lang::get('translations.phone')}}</th>
                        <th style="text-align: center;">{{Lang::get('translations.acoes')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        @if ($loop->index % 2 == 0)
                            @php ($class_tr = "")
                        @else
                            @php ($class_tr = "success")
                        @endif
                    <tr class="{{$class_tr}}">
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone}}</td>
                        <td align="center">
                            <a href="{{ url('/customers/'.$customer->id.'/edit') }}"><button title="{{Lang::get('translations.editar')}}" type="button" class="btn btn-warning btn-circle"><i class="fa fa-list"></i></button></a> |
                            <button id="btn_delete" onclick="getIdDelete({{$customer->id}});" title="{{Lang::get('translations.deletar')}}" type="button" class="btn btn-danger btn-circle" data-id="{{$customer->id}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3"><label>{{Lang::get('translations.no_records_in_the_search')}}</label></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $customers->links() !!}
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>

    <div class="bs-example">
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><label>{{Lang::get('translations.confirm_delete')}}</label></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{Lang::get('translations.confirm_delete_phrase')}}
                        <input type="hidden" name="id_delete_modal" id="id_delete_modal" value="">
                        <!-- Content will be loaded here from "remote.php" file -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{Lang::get('translations.cancelar')}}</button>
                        <button id="delete_record" type="button" class="btn btn-danger">{{Lang::get('translations.deletar')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset("assets/plugins/jquery/dist/jquery.min.js") }}"></script>

<script type="text/javascript">

    //Send id to ajax modal
    function getIdDelete(id) {
        //$('#id_delete_modal').val = id;
        $('input[name="id_delete_modal"]').val(id);
    }

    //Deletar registro
    $('#delete_record').click(function() {
        var id_del = $('input#id_delete_modal').val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        })

        $.ajax({
            url: '/customers/delete_customer',
            method: 'post',
            data: {
              "id_customer": id_del,
            }, // prefer use serialize method
            success:function(data){
                location.reload();
            }
        });

             //alert($('#id_delete_modal').val);
    });
</script>
@stop