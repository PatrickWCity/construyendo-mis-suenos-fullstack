@extends('layouts.app')

@section('content')
<div class="container mt-1 pt-1">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
    <h2>Documento</h2>
    <p>Listado de Documento</p>
    @if(count($documentos) > 0)    
    <table id="listado" class="table table-bordered table-striped table-responsive-sm">
        <thead>
            <tr class="text-center">
                <th class="align-middle">Nombre</th>
                <th class="align-middle">Descripcion</th>
                <th class="align-middle">Archivo</th>
                <th class="align-middle">Fecha de Creacion</th>
                <th class="align-middle">Fecha de Actualizacion</th>
                <th class="align-middle">Tipo de Documento</th>
                <th class="align-middle">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
            <tr>
                <td class="align-middle">{{$documento->nombre}}</td>
                <td class="align-middle">{{$documento->descripcion}}</td>
                <td class="align-middle">{{$documento->archivo}}</td>
                <td class="align-middle">{{Date::parse($documento->fechaCreada)->format('l, j \d\e F \d\e Y G:i')}}</td>
                @if(!$documento->fechaActualizada)
                <td class="align-middle"></td>
                @else
                <td class="align-middle">{{Date::parse($documento->fechaActualizada)->format('l, j \d\e F \d\e Y G:i')}}</td>
                @endif
                <td class="align-middle">{{$documento->TipoDocumento}}</td>
                <td class="align-middle">
                <div class="btn-group btn-block" role="group">
                    <a class="btn btn-primary btn-block" href="/documentos/{{$documento->idDocumento}}" role="button" title="Ver Documento {{$documento->idDocumento}}">Ver</a>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>
<script>$(document).ready(function() {
        table = $("#listado").DataTable({
          dom: "lBfrtip",
            buttons: [
              {
                extend: "copy",
                title: null,
                exportOptions: {
                  columns: "th:not(:last-child)"
                }
              },
              {
                extend: "csv",
                title: "Listado de Documento",
                exportOptions: {
                  columns: "th:not(:last-child)"
                }
              },
              {
                extend: "excel",
                title: "Listado de Documento",
                exportOptions: {
                  columns: "th:not(:last-child)"
                }
              },
              {
                extend: "pdf",
                title: "Listado de Documento",
                exportOptions: {
                  columns: "th:not(:last-child)"
                }
              },
              {
                extend: "print",
                title: "Listado de Documento",
                exportOptions: {
                  columns: "th:not(:last-child)"
                }
              }
            ],
          destroy: true,
          language: esp,
          order: [[ 3, "desc" ]],
          columnDefs: [
            {
              searchable: false,
              orderable: false,
              targets: 6
            }
          ]
        });
      });
      </script>
    @else
        <p>Documento no encontrado.</p>
    @endif
</div>
@endsection