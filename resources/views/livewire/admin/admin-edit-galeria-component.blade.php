<section class="section section-sm section-last bg-default text-left">
    <div class="container">
        <div class="container" style="padding: 60px 0px 60px 0px;">
            <div class="panel-heading" style="padding-bottom: 10px;">
                <div class="row">
                    <div class="col-md-6" style="text-align: left;">
                        <h4>Editar Galeria</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a class="button button-secondary button-pipaluk"
                            href="{{ route('admin.galeria') }}">Regresar</a>
                    </div>
                </div>
            </div>
            <form class="rd-form rd-form-variant-2 rd-mailform formulario-actualizar" wire:submit.prevent="updateEvent">
                <div class="row row-14 gutters-14">
                    <div class="col-4">
                        <strong>Tipo:</strong>
                        <select class="form-control" wire:model="type">
                            <option value="">-- Seleccione --</option>
                            <option value="0">Carousel-1</option>
                            <option value="1">Carousel-2</option>
                            <option value="2">Carousel-3</option>
                            <option value="3">Carousel-4</option>
                            <option value="4">Carousel-5</option>
                            <option value="5">Carousel-6</option>
                        </select>
                        @error('type')
                            <p class="text-danger" style="color: red; font-size: 11px;">La descripción corta es requerida
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <strong>Estado:</strong>
                        <select class="form-control" style="width: auto;" wire:model="status">
                            <option value="">-- Seleccione --</option>
                            <option value="0">Desactivar</option>
                            <option value="1">Activar</option>
                        </select>
                        @error('status')
                            <p class="text-danger" style="color: red; font-size: 11px;">La descripción corta es requerida
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="col-md-4 control-label" style="padding: 7px;"></label>
                        <strong>Imagen:</strong>

                        <input type="file" class="input-file" wire:model="newimage" />
                        @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="200">
                        @else
                            <img src="{{ asset('assets/images/fundacionImagenes/galeriaedit') }}/{{ $image }}" width="200">
                        @endif
                        @error('newimage')
                            <p class="text-danger" style="color: red; font-size: 11px;">La Imagen es requerida</p>
                        @enderror
                    </div>
                </div>
                <button class="button button-primary button-pipaluk" type="submit">Actualizar</button>
            </form>
        </div>
</section>
@push('scripts')
    <script>
        $(function() {
            tinymce.init({
                selector: '#description',
                height: "280",
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    })
                }
            });
        });
    </script>
@endpush
