@extends('welcome')
@section('content')
@foreach ($editar as $k=>$item)

<div class="row">

        <div class="row">
            <div class="input-field col s12 m6 l4">
                <input placeholder="Placeholder" id="placa" value="{{$item->no_placa}}" type="text" class="validate">
                <label for="first_name">Numero de placa</label>
            </div>
            <div class="input-field col s12 m6 l4">
                <input placeholder="Placeholder" value="{{$item->fecha_robo}}" id="fecha" type="text" class="validate">
                <label for="first_name">Fecha de robo</label>
            </div>
            <div class="input-field col s12 m6 l4">
                <input id="chasis" type="text" value="{{$item->no_chasis}}" class="validate">
                <label for="last_name">Numero de chasis</label>
            </div>
        </div>
        <div class="row">
                    
            <div class="input-field col s12">
                <button type="button"  id="editar" class="waves-effect waves-light btn blue col s6 offset-s3"
                value={{$item->id_vehiculo_preliminar}}>
                    Guardar
                </button>     
            </div>
        </div>
</div>
    @endforeach



@endsection

@push('js')
<script>
    $(document).ready(function(){
      
        $("#editar").on('click',function(){
            const add = ( x, y ) => x + y;
            console.log(add(2,3));
            const toastHTML = '<span>Modificado!</span><button class="btn-flat toast-action">x</button>';
            console.log($(this).val());


            $.ajax({    
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    url:'{{url('curso/actualiza')}}',
                    data: {
                        id:$(this).val(),
                        placa:$('#placa').val(),
                        fecha:$('#fecha').val(),
                        chasis:$('#chasis').val()
                    },
                    /* accepts: {
                        mycustomtype: 'application/x-some-custom-type'
                    }, */
                    success: function(res){
                        console.log(res);
                            M.toast({html: toastHTML});
                            $('#placa').val(res[0].no_placa),
                            $('#fecha').val(res[0].fecha_robo),
                            $('#chasis').val(res[0].no_chasis)
                    },
                    /* // Instructions for how to deserialize a `mycustomtype`
                    converters: {
                        'text mycustomtype': function(result) {
                        // Do Stuff
                        return newresult;
                        }
                    }, */
                    error: function(e){
                        console.log('Errors');
                    }
                    /* ,
                    // Expect a `mycustomtype` back from server
                    dataType: 'mycustomtype' */
            });
        })
    });    
</script>

@endpush