@extends('layouts.dashboard')
@section('page_heading',Lang::get('translations.disciplinas'))

@section('section')
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            @section ('cotable_panel_title',Lang::get('translations.listagem_disciplinas'))
            @section ('cotable_panel_body')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{Lang::get('translations.nome')}}</th>
                        <th>{{Lang::get('translations.ano')}}</th>
                        <th>{{Lang::get('translations.acoes')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($disciplines as $discipline)
                    <tr class="success">
                        <td>{{$discipline->name}}</td>
                        <td>{{$discipline->year}}</td>
                        <td>
                            <a href="{{ url('/produto/$discipline->id/edit') }}">Editar</a> |
                            <a href="">Deletar</a>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td>Wayne</td>
                        <td>wayne@gmail.com</td>
                        <td>Manchester, UK</td>
                    </tr>
                    <tr class="info">
                        <td>Andy</td>
                        <td>andy@gmail.com</td>
                        <td>Merseyside, UK</td>
                    </tr>
                    <tr>
                        <td>Danny</td>
                        <td>danny@gmail.com</td>
                        <td>Middlesborough, UK</td>
                    </tr>
                    <tr class="warning">
                        <td>Frank</td>
                        <td>frank@gmail.com</td>
                        <td>Southampton, UK</td>
                    </tr>
                    <tr>
                        <td>Scott</td>
                        <td>scott@gmail.com</td>
                        <td>Newcastle, UK</td>
                    </tr>
                    <tr class="danger">
                        <td>Rickie</td>
                        <td>rickie@gmail.com</td>
                        <td>Burnley, UK</td>
                    </tr>
                </tbody>
            </table>	
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
</div>
@stop