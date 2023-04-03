<div class="img-up">
    <img id="img_logo_signup" src="{{asset('img/Up.png')}}" alt="" >
</div>
<div id="signup" class="bg-purple p-3">
    <section class="container p-3 text-white">
        <form action="{{route('forms.store')}}" method="post">
            @csrf
            {{-- <div class="row justify-content-center">
                <div class="col-6 col-sm-3 text-centerFORM ">
                    <img id="img_logo_signup" src="{{asset('img/logo.png')}}" alt="" >
                </div>
            </div> --}}
            <h1 class="display-4 text-center">Contáctanos</h1>
            <p class="text-center">Para nosotros será un gusto atenderte, contactanos para mas información acerca de nuestros servicios, nos contactaremos contigo lo antes posible.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="tel" id="tel" class="form-control" placeholder="Telefono" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="afair" id="afair" class="form-control" placeholder="Asunto" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Mensaje" required></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-sm btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </section>
</div>
<div class="bg-blue-dark">
    <img id="img_logo_signup" src="{{asset('img/down.png')}}" alt="" >
</div>
