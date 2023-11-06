<?php 

namespace App\Traits;

trait RuleTime {

    public function responseTime() {
        date_default_timezone_set('America/Sao_Paulo');
            
        // Data e hora agora
        $agora = date("Y-m-d H:i:s");
        
        // Converter $agora para o formato Unix timestamp
        $timestamp = strtotime($agora);
        
        // Tempo a ser subtraido - 5 minutos
        $horas = 0; 
        $minutos = 05; 
        $segundos = 00;

        // Transforma o tempo a ser subtraido em segundos
        $tempo = ($horas * 3600) + ($minutos * 60) + $segundos;

        // Subtrair $tempo de $agora
        $novaDataHora = $timestamp - $tempo;

        // Data e hora apos a subtracao
        $datetime2 = date("Y-m-d H:i:s", $novaDataHora);

        return $datetime2;

    }

}