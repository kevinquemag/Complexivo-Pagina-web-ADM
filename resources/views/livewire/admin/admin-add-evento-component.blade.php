    <section class="section section-sm section-last bg-default text-left">
        <div class="container">
            <div class="container" style="padding: 60px 0px 60px 0px;">
                <div class="panel-heading" style="padding-bottom: 10px;">
                  <div class="row">
                      <div class="col-md-6" style="text-align: left;">
                        <h4>Añadir Nuevo Evento</h4>
                      </div>
                      <div class="col-md-6" style="text-align: right;">
                        <a class="button button-secondary button-pipaluk" href="{{ route('admin.eventos') }}">Regresar</a>
                      </div>
                  </div>
                </div>
            <form class="rd-form rd-form-variant-2 rd-mailform formulario-guardar"  wire:submit.prevent="addEvent">
            <div class="row row-14 gutters-14">
                <div class="col-md-4">
                    @error('name')<p class="text-danger" style="color: red; font-size: 11px;">El Título es requerido</p>@enderror
                    <div class="form-wrap">
                    <input class="form-input" placeholder="Título*" type="text" name="name" data-constraints="@Required" wire:model="name"  wire:keyup="generateSlug">
                    <label class="form-label" ></label>
                    </div>
                </div>
                <div class="col-md-4">
                    @error('slug')<p class="text-danger" style="color: red; font-size: 11px;">El Slug es requerido</p>@enderror
                    <div class="form-wrap">
                    <input class="form-input" placeholder="Slug*" type="text" name="slug" data-constraints="@Required" wire:model="slug">
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
                    @error('short_description')<p class="text-danger" style="color: red; font-size: 11px;">La descripción corta es requerida</p>@enderror
                    <div class="form-wrap" wire:ignore>
                    <label class="form-label"></label>
                    <textarea class="form-input textarea-lg" id="short_description" placeholder="Descripción corta*" name="message" data-constraints="@Required" wire:model="short_description"></textarea>
                    </div>
                </div>
                <div class="col-8">
                    @error('description')<p class="text-danger" style="color: red; font-size: 11px;">La descripción Larga es requerida</p>@enderror
                    <div class="form-wrap" wire:ignore>
                    <label class="form-label"></label>
                    <textarea class="form-input textarea-lg" id="description" placeholder="Descripción Larga*" name="message" data-constraints="@Required" wire:model="description"></textarea>
                    </div>
                </div>
                <div class="col-md-12" >
                    <label class="col-md-4 control-label" style="padding: 7px;"></label>
                    <div class="col-md-4" >
                        @error('image')<p class="text-danger" style="color: red; font-size: 11px;">La Imagen es requerida</p>@enderror
                        <input type="file" class="input-file" wire:model="image"/>
                        @if ($image)
                            <img src="{{$image->temporaryUrl()}}" width="200" >
                        @endif
                    </div>
                </div>
            </div>
            <button class="button button-primary button-pipaluk" type="submit">Guardar Evento</button>           
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