
<?php
//clase padre o clase base
class figura
{
    private $posicionX;
    private $posicionY;

    public function Dibujar()
    {
        echo "Dibujo de la figura";
    }
}

//clases hijas
class Circulo extends figura
{
}
class Cuadrado extends figura
{
}
class Triangulo extends figura
{
}
//hasta aqui queda el modelado

//inicia codigo cliente
//objetos
$plato = new Circulo();
$plato->Dibujar();
echo '<br>';
$cuadrado = new Cuadrado();
$cuadrado->Dibujar();
echo '<br>';
$dorito = new Triangulo();
$dorito->Dibujar();
