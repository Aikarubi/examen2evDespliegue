<?php

class Enana
{
    private $nombre; // Nombre de la enana
    private $puntosVida; // Valor de la vida que posee
    private $situacion; // La enana estará 'viva', 'muerta' o 'limbo', dependiendo de sus puntos de vida. >0 = viva; <0 = muerta; =0 = limbo

    public function __construct($a1, $a2)
    {
        $this->nombre = $a1;
        $this->puntosVida = $a2;

        // Establecer la situación según los puntos de vida
        if ($a2 > 0) {
            $this->situacion = "viva";
        } elseif ($a2 < 0) {
            $this->situacion = "muerta";
        } else {
            $this->situacion = "limbo";
        }
    }

    public function heridaLeve()
    {
        // Se le quitan 10 puntos de vida a la Enana
        $this->puntosVida -= 10;

        // Si la enana llega a 0 puntos de vida, cambia la situación a limbo
        if ($this->puntosVida <= 0) {
            $this->situacion = "limbo";
            $this->puntosVida = 0;
        }
    }

    public function heridaGrave()
    {
        // Se le quita toda la vida que posea hasta tener 0 puntos de vida y cambiarle la situación a limbo
        $this->puntosVida = 0;
        $this->situacion = "limbo";
    }

    public function pocima()
    {
        // Solo aplicar la pócima si la enana está viva
        if ($this->situacion !== "muerta") {
            // Recupera 10 puntos de vida
            $this->puntosVida += 10;

            // Si la enana estaba muerta y ahora tiene puntos de vida positivos, vuelve a estar viva
            if ($this->situacion === "muerta" && $this->puntosVida > 0) {
                $this->situacion = "viva";
            }
        }
    }

    public function pocimaExtra()
    {
        // Única manera de devolver a la vida del limbo. Además se otorgarán 50 puntos de vida.
        if ($this->situacion === "limbo") {
            $this->situacion = "viva";
            $this->puntosVida = 50;
        }
    }

    // Getters & setters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPuntosVida()
    {
        return $this->puntosVida;
    }

    public function setPuntosVida($puntosVida)
    {
        $this->puntosVida = $puntosVida;
    }

    public function getSituacion()
    {
        return $this->situacion;
    }

    public function setSituacion($situacion)
    {
        $this->situacion = $situacion;
    }
}
?>
