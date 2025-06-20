@extends('layout.app')
@section('contenido')
<div class="container mt-4">
    <h2 class="mb-4">📌 Registrar Nuevo Registro</h2>

    <form action="{{ route('tumodelo.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="pais"><strong>País:</strong></label>
            <input type="text" name="pais" id="pais" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nombre"><strong>Nombre:</strong></label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5><strong>Ubicación 1:</strong></h5>
                <div class="row">
                    <div class="col-md-6">
                        <label for="latitud1"><strong>Latitud 1:</strong></label>
                        <input type="text" name="latitud1" id="latitud1" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="longitud1"><strong>Longitud 1:</strong></label>
                        <input type="text" name="longitud1" id="longitud1" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label><strong>Seleccione ubicación 1 en el mapa:</strong></label>
                    <div id="mapa1" style="border: 1px solid #ccc; height: 250px; width: 100%;"></div>
                </div>
            </div>

            <div class="col-md-6">
                <h5><strong>Ubicación 2:</strong></h5>
                <div class="row">
                    <div class="col-md-6">
                        <label for="latitud2"><strong>Latitud 2:</strong></label>
                        <input type="text" name="latitud2" id="latitud2" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="longitud2"><strong>Longitud 2:</strong></label>
                        <input type="text" name="longitud2" id="longitud2" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label><strong>Seleccione ubicación 2 en el mapa:</strong></label>
                    <div id="mapa2" style="border: 1px solid #ccc; height: 250px; width: 100%;"></div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle-fill"></i> Guardar
            </button>
            <a href="{{ route('tumodelo.index') }}" class="btn btn-secondary ml-2">
                <i class="bi bi-x-circle"></i> Cancelar
            </a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function initMap() {
        var latitud_longitud = new google.maps.LatLng(-0.9374805, -78.6161327);
        
        // Mapa 1
        var mapa1 = new google.maps.Map(document.getElementById('mapa1'), {
            center: latitud_longitud,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marcador1 = new google.maps.Marker({
            position: latitud_longitud,
            map: mapa1,
            title: "Seleccione ubicación 1",
            draggable: true
        });

        google.maps.event.addListener(marcador1, 'dragend', function () {
            var latitud = this.getPosition().lat();
            var longitud = this.getPosition().lng();
            document.getElementById("latitud1").value = latitud;
            document.getElementById("longitud1").value = longitud;
        });

        // Mapa 2
        var mapa2 = new google.maps.Map(document.getElementById('mapa2'), {
            center: latitud_longitud,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marcador2 = new google.maps.Marker({
            position: latitud_longitud,
            map: mapa2,
            title: "Seleccione ubicación 2",
            draggable: true
        });

        google.maps.event.addListener(marcador2, 'dragend', function () {
            var latitud = this.getPosition().lat();
            var longitud = this.getPosition().lng();
            document.getElementById("latitud2").value = latitud;
            document.getElementById("longitud2").value = longitud;
        });
    }
</script>
@endsection