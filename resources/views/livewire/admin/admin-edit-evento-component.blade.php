<section class="section section-sm section-last bg-default text-left">
    <div class="container">
        <div class="container" style="padding: 60px 0px 60px 0px;">
            <div class="panel-heading" style="padding-bottom: 10px;">
              <div class="row">
                  <div class="col-md-6" style="text-align: left;">
                    <h4>Editar Evento</h4>
                  </div>
                  <div class="col-md-6" style="text-align: right;">
                    <a class="button button-secondary button-pipaluk" href="{{ route('admin.eventos') }}">Regresar</a>
                  </div>
              </div>
            </div>
        <form class="rd-form rd-form-variant-2 rd-mailform formulario-actualizar"  wire:submit.prevent="updateEvent">
        <div class="row row-14 gutters-14">
            <div class="col-md-4">
                @error('name')<p class="text-danger" style="color: red; font-size: 11px;">El Título es requerido</p>@enderror
                <div class="form-wrap">
                <input class="form-input" placeholder="Título*" type="text" name="name"  wire:model="name"  wire:keyup="generateSlug">
                <label class="form-label" ></label>
                </div>
            </div>
            <div class="col-md-4">
                @error('slug')<p class="text-danger" style="color: red; font-size: 11px;">El Slug es requerido</p>@enderror
                <div class="form-wrap">
                <input class="form-input" placeholder="Slug*" type="text" name="slug"  wire:model="slug">
                <label class="form-label" ></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4" >
                    <select class="form-control" style="width: auto;" wire:model="status">
                        <option value="0">Desactivar</option>
                        <option value="1">Activar</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-wrap" wire:ignore>
                <label class="form-label"></label>
                <textarea wire:ignore class="form-input textarea-lg" id="short_description" placeholder="Descripción corta*"   wire:model="short_description"></textarea>
                </div>
            </div>
            <div class="col-8">
                <div class="form-wrap" wire:ignore>
                <label class="form-label"></label>
                <textarea class="form-input textarea-lg"  id="description" placeholder="Descripción Larga*"  wire:model="description"></textarea>
                </div>
            </div>
            <div class="col-md-12" >
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4" >
                    <input type="file" class="input-file" wire:model="newimage"/>
                    @if ($newimage)
                        <img src="{{$newimage->temporaryUrl()}}" width="200" >
                    @else
                        <img src="{{asset('assets/images/home/eventos')}}/{{$image}}" width="200" >
                    @endif
                    @error('newimage')<p class="text-danger" style="color: red; font-size: 11px;">La Imagen es requerida</p>@enderror
                </div>
            </div>
        </div>
        <button class="button button-primary button-pipaluk" type="submit">Actualizar Evento</button>           
        </form>
    </div>
</section>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#short_description',
                height : "280",
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    })
                }
            });

            tinymce.init({
                selector: '#description',
                height : "280",
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    })
                }
            });
        });
    </script>
@endpush