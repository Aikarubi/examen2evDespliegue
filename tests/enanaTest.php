<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        $enanaViva = new Enana("Dora", 50);
        $enanaMuerta = new Enana("Elena", -10);
        $enanaLimbo = new Enana("Laura", 0);

        $this->assertEquals("viva", $enanaViva->getSituacion());
        $this->assertEquals(50, $enanaViva->getPuntosVida());

        $this->assertEquals("muerta", $enanaMuerta->getSituacion());
        $this->assertEquals(-10, $enanaMuerta->getPuntosVida());

        $this->assertEquals("limbo", $enanaLimbo->getSituacion());
        $this->assertEquals(0, $enanaLimbo->getPuntosVida());
    }

    public function testHeridaLeveVive() {
        $enana = new Enana("Elena", 30);
        $enana->heridaLeve();

        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
        $enana = new Enana("Elena", 5);
        $enana->heridaLeve();

        $this->assertLessThanOrEqual(0, $enana->getPuntosVida());
        $this->assertEquals("muerta", $enana->getSituacion());
    }

    public function testHeridaGrave() {
        $enana = new Enana("Elena", 20);
        $enana->heridaGrave();

        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    
    public function testPocimaRevive() {
        $enana = new Enana("Elena", -5);
        $enana->pocima();

        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testPocimaNoRevive() {
        $enana = new Enana("Elena", 0);
        $situacionOriginal = $enana->getSituacion();
        $puntosVidaOriginal = $enana->getPuntosVida();

        $enana->pocima();

        $this->assertEquals($situacionOriginal, $enana->getSituacion());
        $this->assertEquals($puntosVidaOriginal, $enana->getPuntosVida());
    }

    public function testPocimaExtraLimbo() {
        $enana = new Enana("Elena", 0);
        $enana->pocimaExtra();

        $this->assertEquals(50, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }
}
?>
