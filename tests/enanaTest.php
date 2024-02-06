<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        // Crear una enana viva
        $enanaViva = new Enana("Enana Viva", 50);
        $this->assertEquals("Enana Viva", $enanaViva->getNombre());
        $this->assertEquals(50, $enanaViva->getPuntosVida());
        $this->assertEquals("viva", $enanaViva->getSituacion());
        
        // Crear una enana muerta
        $enanaMuerta = new Enana("Enana Muerta", -10);
        $this->assertEquals("Enana Muerta", $enanaMuerta->getNombre());
        $this->assertEquals(-10, $enanaMuerta->getPuntosVida());
        $this->assertEquals("muerta", $enanaMuerta->getSituacion());
        
        // Crear una enana en limbo
        $enanaLimbo = new Enana("Enana Limbo", 0);
        $this->assertEquals("Enana Limbo", $enanaLimbo->getNombre());
        $this->assertEquals(0, $enanaLimbo->getPuntosVida());
        $this->assertEquals("limbo", $enanaLimbo->getSituacion());
    }
    public function testHeridaLeveVive() {
        // Crear una enana viva con suficientes puntos de vida
        $enana = new Enana("Enana Viva", 30);
        
        // Realizar una herida leve
        $enana->heridaLeve();
        
        // Verificar que la vida es mayor que 0
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        
        // Verificar que su situación es "viva"
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
        // Crear una enana con puntos de vida insuficientes para sobrevivir a una herida leve
        $enana = new Enana("Enana Moribunda", 5);
        
        // Realizar una herida leve
        $enana->heridaLeve();
        
        // Verificar que la vida es menor o igual que 0
        $this->assertLessThanOrEqual(0, $enana->getPuntosVida());
        
        // Verificar que su situación es "muerta"
        $this->assertEquals("muerta", $enana->getSituacion());
    }

    public function testHeridaGrave() {
        // Crear una enana viva
        $enana = new Enana("Enana Viva", 50);
        
        // Realizar una herida grave
        $enana->heridaGrave();
        
        // Verificar que la vida es 0
        $this->assertEquals(0, $enana->getPuntosVida());
        
        // Verificar que su situación es "limbo"
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    
    public function testPocimaRevive() {
        // Crear una enana muerta pero con una vida mayor que -10 y menor que 0
        $enana = new Enana("Enana Moribunda", -5);
        
        // Administrar una pócima
        $enana->pocima();
        
        // Verificar que la vida es mayor que 0
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        
        // Verificar que su situación ha cambiado a "viva"
        $this->assertEquals("viva", $enana->getSituacion());
    }
    

    public function testPocimaNoRevive() {
        // Crear una enana en limbo
        $enana = new Enana("Enana en Limbo", 0);
        $enana->setSituacion("limbo"); // Asegurarse de que la enana esté en limbo
        
        // Obtener el estado inicial de la enana
        $vidaInicial = $enana->getPuntosVida();
        $situacionInicial = $enana->getSituacion();
        
        // Administrar una pócima
        $enana->pocima();
        
        // Verificar que la vida y situación no han cambiado
        $this->assertEquals($vidaInicial, $enana->getPuntosVida());
        $this->assertEquals($situacionInicial, $enana->getSituacion());
    }

    public function testPocimaExtraLimbo() {
        // Crear una enana en limbo
        $enana = new Enana("Enana en Limbo", 0);
        $enana->setSituacion("limbo"); // Asegurarse de que la enana esté en limbo
        
        // Obtener el estado inicial de la enana
        $vidaInicial = $enana->getPuntosVida();
        $situacionInicial = $enana->getSituacion();
        
        // Administrar una pócima extra
        $enana->pocimaExtra();
        
        // Verificar que la vida es 50 y la situación ha cambiado a "viva"
        $this->assertEquals(50, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }
    
}
?>