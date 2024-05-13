<?php

abstract class FiguraGeometrica
{
    protected $fila;
    protected $columna;

    abstract public function Dibujar();
    abstract public function CalcularArea();
    abstract public function dibujoreal();

    public function dibujarp($fila, $columna)
    {
        $this->fila = $fila;
        $this->columna = $columna;
        echo "Fila: " . $this->fila . ", Columna: " . $this->columna;
    }
}

//Implementación de las fabricas, clases hijas
class Circulo extends FiguraGeometrica
{
    private $nombre_objeto;

    public function Dibujar()
    {
        echo "Circulo Dibujado";
        echo "<br>";
    }
    public function CalcularArea()
    {
    }
    public function dibujoreal()
    {
        switch ($this->nombre_objeto) {
            case 'plato';
                // Calcular la posición del div
                echo "<div style='border: 1px solid blue; position: relative; left: {$this->fila}px; top: {$this->columna}px;'>";
                echo "Plato dibujado";
                echo "<br>";
                echo "<img width='100' height='100' src='https://imgs.search.brave.com/TBp6C6YYIMFdktzmUD1j6RBIcpdttQEvdUtfCwIESKQ/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pLmJs/b2dzLmVzL2JlNDQ1/MS8xMDI0XzY4Mi80/NTBfMTAwMC5qcGc'>";
                echo "</div>";
                break;
            case 'moneda';
                echo "<img  width='100' height='100' src='https://imgs.search.brave.com/3UmaI7_lS_8Xzs3m-IiN18w6gWi0kGmTn6MRlUMfp4U/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9jZG4y/LmRpbmVyb2VuaW1h/Z2VuLmNvbS84MzB4/NjIzL2ZpbHRlcnM6/Zm9ybWF0KGpwZyk6/cXVhbGl0eSg3NSkv/bWVkaWEvZGluZXJv/L2ltYWdlcy8yMDE3/LzA2LzUwY21leGlj/by5qcGc'>";
                break;
            case 'triangulo';
                return new triangulo();
                break;
        }
    }
    //función propia de la clase
    public function SetNombre($nombre)
    {
        $this->nombre_objeto = $nombre;
    }
}
class Cuadrado extends FiguraGeometrica
{
    private $radio;

    public function Dibujar()
    {
    }
    public function CalcularArea()
    {
    }
    public function dibujoreal()
    {
    }
    //función propia de la clase
    public function SetRadio($parameradio)
    {
        $this->radio = $parameradio;
    }
}
class Triangulo extends FiguraGeometrica
{
    private $radio;

    public function Dibujar()
    {
        echo "Triangulo Dibujado";
        echo "<br>";
    }
    public function CalcularArea()
    {
    }
    public function dibujoreal()
    {
    }
    //función propia de la clase
    public function SetRadio($parameradio)
    {
        $this->radio = $parameradio;
    }
}

//creamos la factory de figuras, fabrica
class figuraFactory
{
    public static function CrearFigura($nombre_figura)
    {
        switch ($nombre_figura) {
            case 'circulo';
                return new circulo();
                break;
            case 'cuadrado';
                return new cuadrado();
                break;
            case 'triangulo';
                return new triangulo();
                break;
        }
    }
}
//objetos
//circulo
$plato = figuraFactory::CrearFigura('circulo');
$plato->Dibujar();
$plato->SetNombre('plato');
$plato->dibujarp(800, 800);
$plato->dibujoreal();
echo "<br>";
$moneda = figuraFactory::CrearFigura('circulo');
$moneda->Dibujar();
$moneda->SetNombre('moneda');
$moneda->dibujoreal();
echo "<br>";

//triangulo
$dorito = figuraFactory::CrearFigura('triangulo');
$dorito->Dibujar();
