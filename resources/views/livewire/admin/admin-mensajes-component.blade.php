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
              <h4>Mensajes de Contacto</h4>
            </div>
        </div>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Información</th>
            <th scope="col">Comentario</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
          <tr>
            <td style="padding: 0.45rem;" class="col-md-2 col-sm-1">
                {{$message->name}}
                <br>
                {{$message->email}}
                <br>                
                <a class="link-phone" target="_blank" href="https://api.whatsapp.com/send/?phone=593{{$message->phone}}&text=Fundaci%C3%B3n+Diabetes+Juvenil.&app_absent=0">{{$message->phone}}</a>
                <br>
                {{$message->province}}
            </td>
            <td style="padding: 0.45rem;" class="col-md-2 col-sm-1">{{$message->comment}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$messages->links()}}
      <br><br><br><br>
    </div>
  </div>