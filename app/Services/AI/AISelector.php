<?php

namespace App\Services\AI;

use App\Services\AI\Strategies\RandomStrategy;
use App\Services\AI\Strategies\HunterStrategy;
use App\Services\AI\Strategies\ProbabilisticStrategy;

/**
 * Serviço simples que seleciona a estratégia de IA com base na dificuldade do jogo.
 *
 * Observação: não foi encontrada uma model `Game` no projeto. Aqui assumimos que
 * o objeto passado para `playTurn` possui as propriedades `difficulty` e `playerBoard`.
 */
class AISelector
{
    /**
     * Executa a jogada da IA e retorna as coordenadas escolhidas.
     *
     * @param mixed $game Objeto que contém `difficulty` e `playerBoard`.
     * @return array ['x' => int, 'y' => int]
     */
    public function playTurn($game): array
    {
        $difficulty = $game->difficulty ?? 'basic';

        $strategy = match ($difficulty) {
            'basic' => new RandomStrategy(),
            'intermediate' => new HunterStrategy(),
            'advanced' => class_exists(ProbabilisticStrategy::class) ? new ProbabilisticStrategy() : new RandomStrategy(),
            default => new RandomStrategy(),
        };

        return $strategy->chooseTarget($game->playerBoard);
    }
}
