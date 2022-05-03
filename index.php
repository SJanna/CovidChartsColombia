<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Charts</title>
    <link rel="icon" href="sources/covidFavicon.png">
    <!--https://cdn-icons-png.flaticon.com/512/2913/2913465.png-->
    <!--Estilos CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Se llama a la librería Chart.Js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php //Se llama a la conexión con el servidor 
    include('conexion.php');
    //include('grafica_1.php');
    //include('grafica_2.php');
    //include('grafica_2.php');
    ?>
    <header>
        <a href="#" class="logo">Covid Datasets<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="#banner">Home</a></li>
            <li><a href="#ActiveCases">ActiveCases</a></li>
            <li><a href="#banner">Deaths</a></li>
            <li><a href="#banner">Vaccinations</a></li>
            <li><a href="#banner">Contact</a></li>
        </ul>
    </header>


    <section class="banner" id="banner">
        <div class="content">
            <h2>Covid-19</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Asperiores consequuntur repudiandae blanditiis in ipsam neque ipsa unde odit ea,
                natus, culpa quidem soluta suscipit doloribus rerum consequatur explicabo sint
                eius.</p>
            <a href="#" class="btn">Our Menu</a>
    </section>


    <section class="ActiveCases" id="ActiveCases">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>A</span>ctive Cases</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non hic quos commodi eligendi. Nihil, voluptates ducimus. Non sed a quo dolorem nostrum quod recusandae placeat, deserunt corporis, amet repellendus.</p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <!-- <img src="sources/grafico_coronavirus_1.jpg"> -->
                    <canvas class="graficaCovid" id="graficaCovid">
                        <?php
                        include("grafica_1.php");
                        ?>
                </div>
                <button class="btn" onclick="genero('Hombres')">Hombres</button>
                <button class="btn" onclick="genero('Mujeres')">Mujeres</button>
                <button class="btn" onclick="genero('Ambos')">Ambos</button><br>
            </div>
        </div>
    </section>


    <section class="ActiveCases" id="ActiveCases">
        <div class="row">
            <div class="col50">
                <div class="imgBx">
                    <!-- <img src="sources/grafico_coronavirus_1.jpg"> -->
                    <canvas class="graficaCovid" id="graficaCovid2">
                        <?php
                        include("grafica_2.php");
                        ?>
                </div>
                <button class="btn" onclick="genero2('Hombres')">Hombres</button>
                <button class="btn" onclick="genero2('Mujeres')">Mujeres</button>
                <button class="btn" onclick="genero2('Ambos')">Ambos</button>
            </div>

            <div class="col50">
                <h2 class="titleText"><span>A</span>ctive Cases</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non hic quos commodi eligendi. Nihil, voluptates ducimus. Non sed a quo dolorem nostrum quod recusandae placeat, deserunt corporis, amet repellendus.</p>
                
            </div>
    </section>

    <section class="ActiveCases" id="ActiveCases">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>A</span>ctive Cases</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non hic quos commodi eligendi. Nihil, voluptates ducimus. Non sed a quo dolorem nostrum quod recusandae placeat, deserunt corporis, amet repellendus.</p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <!-- <img src="sources/grafico_coronavirus_1.jpg"> -->
                    <canvas class="graficaCovid" id="graficaCovid3">
                        <?php
                        include("grafica_3.php");
                        ?>
                </div>
            </div>
        </div>
    </section>



    <!--Header animation-->
    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        // this function changes the class name of the menuToggle element to menuToggle active. So when the name is menuToggle active we can reference it in the css stylesheet.
        function toggleMenu() {
            const menuToggle = document.querySelector('.menuToggle');
            const navigation = document.querySelector('.navigation');
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>

    <!--Grafica 1-->


















    <!--ATRIBUCIONES PENDIENTES
ICONO <a href="https://www.flaticon.es/iconos-gratis/virus" title="virus iconos">Virus iconos creados por Freepik - Flaticon</a>
    -->


</body>

</html>