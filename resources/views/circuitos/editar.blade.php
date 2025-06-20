@extends('layout.app')
@section('contenido')
    <form action="{{ route('tumodelo.update', $registro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar Registro</h1>

        <label><b>País:</b></label><br>
        <input type="text" name="pais" value="{{ $registro->pais }}" class="form-control mb-2"><br>

        <label><b>Nombre:</b></label><br>
        <input type="text" name="nombre" value="{{ $registro->nombre }}" class="form-control mb-2"><br>

        <label><b>Latitud 1:</b></label><br>
        <input type="text" name="latitud1" id="latitud1" value="{{ $registro->latitud1 }}" class="form-control mb-2"><br>

        <label><b>Longitud 1:</b></label><br>
        <input type="text" name="longitud1" id="longitud1" value="{{ $registro->longitud1 }}" class="form-control mb-2"><br>

        <label><b>Latitud 2:</b></label><br>
        <input type="text" name="latitud2" id="latitud2" value="{{ $registro->latitud2 }}" class="form-control mb-2"><br>

        <label><b>Longitud 2:</b></label><br>
        <input type="text" name="longitud2" id="longitud2" value="{{ $registro->longitud2 }}" class="form-control mb-2"><br>

        <div id="mapa_registro" style="border:1px solid black; height:400px; width:100%; margin-bottom:20px;"></div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        &nbsp;&nbsp;
        <a href="{{ route('tumodelo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        function initMap() {
            const punto1 = {
                lat: parseFloat("{{ $registro->latitud1 }}") || 0,
                lng: parseFloat("{{ $registro->longitud1 }}") || 0
            };
            const punto2 = {
                lat: parseFloat("{{ $registro->latitud2 }}") || 0,
                lng: parseFloat("{{ $registro->longitud2 }}") || 0
            };

            const map = new google.maps.Map(document.getElementById("mapa_registro"), {
                center: punto1,
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            const marker1 = new google.maps.Marker({
                position: punto1,
                map: map,
                draggable: true,
                label: "1"
            });

            const marker2 = new google.maps.Marker({
                position: punto2,
                map: map,
                draggable: true,
                label: "2"
            });

            marker1.addListener("dragend", function (event) {
                document.getElementById("latitud1").value = event.latLng.lat();
                document.getElementById("longitud1").value = event.latLng.lng();
            });

            marker2.addListener("dragend", function (event) {
                document.getElementById("latitud2").value = event.latLng.lat();
                document.getElementById("longitud2").value = event.latLng.lng();
            });
        }
    </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap">
    </script>
@endsection
