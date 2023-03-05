      <!-- Contact information-->
      <section class="section section-sm section-first bg-default" style="padding: 60px 0px 60px 0px; padding-bottom: 0px">
        <div class="container" style=" max-width: 968px">
          <div class="row row-14 gutters-14">
            <div class="col-md-6">
              <div class="form-wrap">
                <div class="contenedor1" style="padding: 20px">
                    <a href="#">
                        <figure>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d814.8677634571773!2d-78.55209730999078!3d-0.290422315718495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59905926e810d%3A0x41da61a1ac9b92a3!2sMi%20Tiendita%20Nifo!5e0!3m2!1ses!2sec!4v1676581330222!5m2!1ses!2sec" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </figure>
                    </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <div class="contenedor1" style="padding: 20px">
                    <a href="#">
                        <figure>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d1994.9068510207783!2d-78.50845032420531!3d-0.0871770677763504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e2!4m3!3m2!1d-0.08713839999999999!2d-78.5073749!4m3!3m2!1d-0.0872199!2d-78.5073553!5e0!3m2!1ses!2sec!4v1676582180194!5m2!1ses!2sec" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </figure>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container" style=" max-width: 968px">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <article class="box-contacts">
                <div class="box-contacts-body">
                    <br>
                  <p class="box-contacts-link"><a href="#">Ibarra</a></p>
                  <br>
                  <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#">Atuntaqui (Sucre y Rio Amazonas).</a></p>
                  <p class="box-contacts-link"><a href="tel:#">0984198768</a></p>
                  <p class="box-contacts-link"><a href="tel:#">(06) 123-4391</a></p>
                  <div class="unit-body" style="padding-top: 10px;"><a class="link-phone" href="#"><span class="icon fa fa-whatsapp" style="padding-right: 5px"></span>Más información escribenos al 0984198768</a></div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <article class="box-contacts">
                <div class="box-contacts-body">
                    <br>
                  <p class="box-contacts-link"><a href="#">Quito</a></p>
                  <br>
                  <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#">La roldoz (oe9n81-118).</a></p>
                  <p class="box-contacts-link"><a href="#">0995486565</a></p>
                  <p class="box-contacts-link"><a href="#">(02) 249-7527</a></p>

                  <br>
                  <div class="unit-body" style="padding-top: 10px;"><a class="link-phone" href="#"><span class="icon fa fa-whatsapp" style="padding-right: 5px"></span>Más información escribenos al 0995486565</a></div>
                </div>
              </article>
            </div>
            {{-- <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></p>
                </div>
              </article>
            </div> --}}
            {{-- <div class="col-sm-6 col-md-6 col-lg-6">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="mailto:#">mail@demolink.org</a></p>
                  <p class="box-contacts-link"><a href="mailto:#">info@demolink.org</a></p>
                </div>
              </article>
            </div> --}}
          </div>
        </div>
      <!-- Contact Form-->
        <div class="container"  style="padding-bottom: 60px; max-width: 968px">
          <article class="title-classic">
            <div class="title-classic-title">
              <h3>Escríbenos</h3>
            </div>
          </article>
          <form class="rd-form rd-form-variant-2 rd-mailform formulario-guardar" wire:submit.prevent="sendMessage">
            <div class="row row-14 gutters-14">
              <div class="col-md-6">
                <label>Nombres y Apellidos</label>
                <div class="form-wrap">
                  <input class="form-input" id="contact-your-name-2" type="text" name="name" wire:model="name">
                </div>
              </div>
              <div class="col-md-6">
                <label>Correo Electrónico</label>
                <div class="form-wrap">
                  <input class="form-input" id="contact-email-2" type="email" name="email" wire:model="email">
                </div>
              </div>
              <div class="col-md-6">
                <label>Teléfono de contacto (WhatsApp)</label>
                <div class="form-wrap">
                  <input class="form-input" id="contact-phone-2" type="text" name="phone" wire:model="phone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <label  >Selecione la Provincia</label>
                  <br>
                  <select class="form-control" wire:model="province">
                    <option value="Azuay">Azuay</option>
                    <option value="Cañar">Cañar</option>
                    <option value="Loja">Loja</option>
                    <option value="Carchi">Carchi</option>
                    <option value="Imbabura">Imbabura</option>
                    <option value="Pichincha">Pichincha</option>
                    <option value="Cotopaxi">Cotopaxi</option>
                    <option value="Tungurahua">Tungurahua</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Chimborazo">Chimborazo</option>
                    <option value="Sto. Domingo de los Tsachilas">Sto. Domingo de los Tsachilas</option>
                    <option value="Esmeraldas">Esmeraldas</option>
                    <option value="Manabí">Manabí</option>
                    <option value="Guayas">Guayas</option>
                    <option value="Los Ríos">Los Ríos</option>
                    <option value="El Oro">El Oro</option>
                    <option value="Santa Elena">Santa Elena</option>
                    <option value="Sucumbíos">Sucumbíos</option>
                    <option value="Napo">Napo</option>
                    <option value="Pastaza">Pastaza</option>
                    <option value="Orellana">Orellana</option>
                    <option value="Morona Santiago">Morona Santiago</option>
                    <option value="Zamora Chinchipe">Zamora Chinchipe</option>
                    <option value="Galápagos">Galápagos</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <label >¿Cuál es su necesidad?</label>
                <div class="form-wrap">
                  <textarea class="form-input textarea-lg" id="contact-message-2" name="message"  wire:model="comment"></textarea>
                </div>
              </div>
            </div>
            <input class="button button-primary" type="submit" name="ok" value="Enviar mensaje" >
          </form>
        </div>
      </section>
