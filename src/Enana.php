<?php

class Enana
{
    private $nombre; // Nombre de la enana
    private $puntosVida; // Valor de la vida que posee
    private $situacion; // La enana estará 'viva', 'muerta' o 'limbo', dependiendo de sus puntos de vida. >0 = viva; <0 = muerta; =0 = limbo

    public function __construct($a1, $a2)
    {
        // El constructor tiene tan solo 2 parámetros. No añadas más.
        // Deberás de completar situación dependiendo de puntosVida.
        $this->nombre = $a1;
        $this->puntosVida = $a2;
        if ($a2 > 0) {
            $this->situacion = "viva";
        } elseif ($a2 < 0) {
            $this->situacion = "muerta";
        } else {
            $this->situacion = "limbo";
        }
    }

    public function heridaLeve() {
        // Se le quitan 10 puntos de vida a la Enana
        $this->puntosVida -= 10;
    
        // Se verifica si la enana sigue viva después de recibir la herida
        if ($this->puntosVida <= 0) {
            $this->situacion = "muerta";
        }
    }
    

    public function heridaGrave() {
        // Se le quita toda la vida que posea hasta tener 0 puntos de vida
        $this->puntosVida = 0;
    
        // Se cambia la situación a limbo
        $this->situacion = "limbo";
    }
    

    public function pocima() {
        // Si la enana está en limbo, la pocima no le afecta.
        if ($this->situacion !== "limbo") {
            // Recupera 10 puntos de vida
            $this->puntosVida += 10;
    
            // Verifica si la enana estaba muerta y si sus puntos de vida han pasado a ser mayores que 0
            if ($this->situacion === "muerta" && $this->puntosVida > 0) {
                $this->situacion = "viva";
            }
        }
    }
    

    public function pocimaExtra() {
        // Solo afecta a enanas en el limbo
        if ($this->situacion === "limbo") {
            // Devuelve a la enana a la vida y otorga 50 puntos de vida
            $this->situacion = "viva";
            $this->puntosVida += 50;
        }
    }
    

    //Getter's & setter's
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPuntosVida()
    {
        return $this->puntosVida;
    }

    public function setPuntosVida($puntosVida): self
    {
        $this->puntosVida = $puntosVida;

        return $this;
    }

    public function getSituacion()
    {
        return $this->situacion;
    }

    public function setSituacion($situacion): self
    {
        $this->situacion = $situacion;

        return $this;
    }
}
?>
