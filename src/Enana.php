<?php

class Enana
{
    private $nombre; // Nombre de la enana
    private $puntosVida; // Valor de la vida que posee
    private $situacion; // La enana estará 'viva', 'muerta' o 'limbo', dependiendo de sus puntos de vida. >0 = viva; <0 = muerta; =0 = limbo

    public function __construct($nombre, $puntosVida)
    {
        // El constructor tiene tan solo 2 parámetros. No añadas más.
        // Deberás de completar situación dependiendo de puntosVida.
        $this->nombre = $nombre;
        $this->puntosVida = $puntosVida;

        // Se establece la situación según los puntos de vida
        if ($puntosVida > 0) {
            $this->situacion = "viva";
        } elseif ($puntosVida < 0) {
            $this->situacion = "muerta";
        } else {
            $this->situacion = "limbo";
        }
    }

    public function heridaLeve()
    {
        // Se le quitan 10 puntos de vida a la Enana y además se cambia el valor de situación (si fuera necesario)
        $this->puntosVida -= 10;

        // Si la enana tenía exactamente 10 puntos de vida, quedará en limbo
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
        // Recupera 10 puntos de vida y además cambia el valor de situación si así fuera necesario.
        if ($this->situacion !== "limbo") {
            $this->puntosVida += 10;
            // Si la enana estaba muerta, vuelve a estar viva
            if ($this->puntosVida > 0) {
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
