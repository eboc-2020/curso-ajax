@extends('welcome')
@section('content')
<div class="row">
    <div class="col s12">
        <a class="waves-effect waves-light btn-large" href="{{route('curso.index')}}">Ir a index</a>
    </div>
</div>
<div class="row">
    <div class="col s12" style="margin: top">
        <a class="waves-effect waves-light btn tooltipped" 
        data-position="bottom" data-tooltip="Soy el primero">
        <i class="material-icons right">cloud</i>
        button
        </a>
    </div>

</div>
<div class="row">
    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    </ul>
</div>
<div class="row">
        <table class="highlight">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Placa</th>
                    <th>Chasis</th>
                    <th>Fecha robo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                    {{-- @foreach ($datos as $k=>$item)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>@if (empty($item->no_placa))
                                {{ 'Sin placa' }}
                            @else
                                {{$item->no_placa}}
                            @endif
                        </td>
                        <td>@if (empty($item->no_chasis))
                            {{ 'Sin chasis' }}
                        @else
                            {{$item->no_chasis}}
                        @endif
                    </td>
                        <td>{{$item->fecha_robo}}</td>
                        <td>
                            <a class="waves-effect waves-light btn-small light blue" href="{{route('curso.edit',$item->id_vehiculo_preliminar)}}" id="editar">
                                <i class="material-icons left">edit</i>Editar
                            </a>
                        </td>
                    </tr>
                    @endforeach --}}

            </tbody>
        </table>
        <div class="container">

            {{-- {{ $datos->links() }} --}}
        </div>
    </div>
</form>



@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('.tooltipped').tooltip();
            $('.collapsible').collapsible();
            $('.modal').modal();
        });
    </script>
@endpush



