<?php
//se convierte en interface, actua como clase pero esto lo va implementar
interface Figura
{
    public function Dibujar();

    public function CalcularPerimetro();
    
    public function dibujoreal();
}

//Implementación de las fabricas, clases hijas
class Circulo implements Figura
{
    private $radio;

    public function Dibujar()
    {
        echo "Circulo Dibujado";
    }
    public function Calcular()
    {
        echo '<br>';
        echo "El área del circulo es ".(3.14*($this->radio*$this->radio));
    }

    public function SetRadio($parameradio)
    {
        $this->radio = $parameradio;
    }
    public function CalcularPerimetro(){

    }
    public function dibujoreal(){

    }
}

class Cuadrado implements Figura
{
    private $lado;
    public function Dibujar()
    {
        echo "Cuadrado Dibujado";
    }
    public function Calcular()
    {
        echo "Se calcula el área del Cuadrado";
    }
    public function CalcularPerimetro(){

    }
    public function dibujoreal(){

    }
}

class Triangulo implements Figura
{
    private $base;
    private $altura;

    public function Dibujar()
    {
        echo "Triangulo Dibujado";
    }
    public function Calcular()
    {
        echo "Se calcula el área del Triangulo";
    }
    public function CalcularPerimetro(){

    }
    public function dibujoreal(){

    }
}

//creamos la factory de figuras, fabrica
class figuraFactory
{
    public static $instancia;
    public static function CrearFigura($la_figura)
    {
        if ($la_figura == "Circulo") {
            return $instancia = new Circulo();
        } elseif ($la_figura == "Cuadrado") {
            return $instancia = new Cuadrado();
        } elseif ($la_figura == "Triangulo") 
            return $instancia = new Triangulo();
         else {
            echo "Figura desconocida";
        }
    }
}


//codigo cliente
$plato = figuraFactory::CrearFigura("Circulo");
$plato->SetRadio(10);
$plato->Dibujar();
$plato->Calcular();
echo '<br>';
$cuadro = figuraFactory::CrearFigura("Cuadrado");
$cuadro->Dibujar();
echo '<br>';
$dorito = figuraFactory::CrearFigura("Triangulo");
$dorito->Dibujar();
