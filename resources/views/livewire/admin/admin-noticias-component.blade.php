<div>
  <style>
      nav svg{
          height: 20px;
      }
      nav .hidden{
          display: block !important;
      }
  </style>
  <div class="container" style="padding: 60px 0px 0px 0px;">
    <div class="panel-heading" style="padding-bottom: 10px;">
      <div class="row">
          <div class="col-md-6" style="text-align: left;">
            <h4>Todos las Noticias</h4>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <a class="button button-secondary button-pipaluk" href="{{ route('admin.addnotice') }}">Añadir Nueva Noticia</a>
          </div>
      </div>
    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th  style="padding: 0.45rem;" scope="col">Imagen</th>
          <th  style="padding: 0.45rem;" scope="col">Título</th>
          <th  style="padding: 0.45rem;" scope="col">Estado</th>
          <th  style="padding: 0.45rem;" scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notices as $notice)
        <tr>
          <td style="padding: 0.45rem;" ><img src="{{ asset('assets/images/home/noticias') }}/{{$notice->image}}" width="80"></td>
          <td style="padding: 0.45rem;" >{{$notice->name}}</td>
          <td style="padding: 0.45rem;" >
            @if ($notice->status == '1')
              Activado
            @else
              Desactivado
            @endif
          </td>
          <td style="font-size: 10px; padding: 0.45rem;">
            <a href="{{route('admin.editnotice',['noticias_slug'=>$notice->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
            <a onclick="eliminar()" wire:click.prevent="deleteNotice({{$notice->id}})" style="margin-left: 10px; color:red"><i class="fa fa-times fa-2x text-danger"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$notices->links()}}
    <br><br><br><br>
  </div>
</div>