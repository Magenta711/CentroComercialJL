@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2',['img' => 's_img_12.jpg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('pages')}}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i> 
                </span>
                <a class="nav-link active disabled" href="#">NOSOTROS</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <div class="jumbotron">
                <h1 class="display-4 text-blue-dark text-center">CENTRO COMERCIAL JOSÉ LUÍS</h1>
                <p class="lead text-center text-blue-dark">Novedoso y único centro comercial en el municipio de Barbosa Antiquia.</p>
                <hr class="my-4">
                <h2 class="text-blue-dark text-center">Historia</h2>
                <p>El Centro Comercial José Luis es un edificio construido en los años 2014 y 2015, bajo licencia de construcción aprobada por planeación municipal, mediante las resoluciones 000508 de 05 de marzo de 2014 y resolución 004696 de 30 de diciembre de 2014. El Centro Comercial se constituye como una Sociedad Anónima Simplificada el 20 de agosto de 2015, mediante acta de creación debidamente asentada en Cámara de Comercio de Medellín. La sociedad queda registrada bajo el nombre Centro Comercial José Luis y puede utilizar la sigla CC José Luis, se registra con el NIT 900 881 434 – 7 y se designa como administrador operativo y representante legal al señor Jorge Andrés Ortega y como contadora y administradora financiera a la señora Kelly Johana Ortega. La administración, que será liderada por las dos personas antes mencionadas, tendrá como primer objetivo la correcta administración de los bienes del Centro Comercial, para garantizar su mantenimiento y correcta actualización en temas de seguridad, salud y tecnología, entre otros. Su segundo objetivo será garantizar y promover el progreso de las instalaciones del Centro Comercial y de los comerciantes locatarios del mismo. Su tercer objetivo será el aporte social a la sociedad Barboseña.</p>
                <p>El Centro Comercial José Luis S.A.S. es una entidad en la cual sus socios persiguen dos lucros a nivel particular y un tercer lucro a nivel social, así:</p>
                <p>1) Lucro particular: Los socios persiguen la correcta administración de los bienes del centro comercial y lograr una renta de los mismos por concepto de arriendos, más no por la operación del Centro Comercial.</p>
                <p>2) Lucro particular: Es el progreso del Centro Comercial y de sus locatarios a nivel local y regional, logrando la actualización locataria, en seguridad, tecnología y administración, necesaria para que el Centro Comercial sea siempre un ejemplo de progreso en el municipio y en la región.</p>
                <p>3) Lucro Social: Se le da una facultad especial al Gerente para asignar las ganancias posteriores a los dos lucros anteriores a obras sociales en bien de la comunidad en general o de los clientes del Centro Comercial.</p>
                <h2 class="text-blue-dark text-center">Quiénes somos</h2>
                <p>El CENTRO COMERCIAL JOSÉ LUIS está concebido como una unidad arquitectónica integrada por unidades privadas y bienes de uso común, destinada al funcionamiento organizado y permanente de establecimientos dedicados a actividades comerciales y de servicios.</p>
                <p>El Centro Comercial está regido por la Ley 675 de 2001 de Propiedad Horizontal, que reglamenta su manejo como copropiedad. Cuenta con un área construida de aproximadamente 1.400 m², distribuidos en 313 m² de zona común y 1.087 m² de área privada. Tiene un ascensor, sistema de televisión cerrada y alarma monitoreada remotamente.</p>
                <p>Trabajamos para obtener altos niveles de eficiencia y sostenibilidad económica, ambiental y social. Contamos con proveedores y personal innovador, confiable y altamente calificado, que desarrolla su labor propiciando ambientes cómodos, agradables y seguros.</p>
                <p>El Conjunto Comercial José Luis se destaca por su visión empresarial y su fe en el futuro, por esta razón siempre está buscando herramientas para seguir afianzándose como un conjunto especializado en servicios de salud, turismo, vestuario, calzado, finanzas, restaurantes y complementarios, para que la estadía de sus clientes y usuarios se convierta en una experiencia agradable y positiva en cada visita. El Centro Comercial José Luis, será un polo de atracción y punto de referencia para el municipio de Barbosa</p>
                <p>En el centro comercial José Luis nuestros comerciantes y visitantes son lo mas importante, tenemos espacios para que emprendas tu negocio en nuestras locales de alquiles, espacios publicitarios para hacer conocer tu marca, servicio de alquiler de auditorio y además espacio en la terraza para sus eventos o reuniones sociales por lo mas alto. No te pierdas la oportunidad de visitarnos.</p>

                <h2 class="text-blue-dark text-center">Misión</h2>
                <p>Somos un grupo de empresarios innovadores, líderes en la prestación de servicios y comercio, que sirve a la comunidad municipal y nacional. Prestamos servicios innovadores con proveedores y personal confiable y altamente calificado. Ofrecemos espacios cómodos, agradables y seguros. Garantizamos altos niveles de eficiencia y sostenibilidad económica, ambiental y social. Somos un polo de atracción y punto de referencia municipal. Es una empresa con responsabilidad social y ambiental.</p>
                <h2 class="text-blue-dark text-center">Visión</h2>
                <p>El Conjunto Comercial José Luis en el año 2028 será un centro especializado en salud, turismo y afines, reconocido por el respeto, la calidez humana, la actualización tecnológica y la responsabilidad social.</p>
              </div>
        </section>
    </div>
    @include('pages.layouts.contact-form') 
@endsection