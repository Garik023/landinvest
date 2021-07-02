<?php


namespace App;


use Exception;


class InvestCalc
{
    use Helpers;

    const TRANCHE_A = 'TRANCHE_A';
    const TRANCHE_B = 'TRANCHE_B';
    const DATE_FORMAT = 'd.m.Y';

    protected $maxAmount = 1000;

    protected $startDate = '10.01.2021';
    protected $endDate = '15.11.2021';

    protected $minPercent = 3;
    protected $maxPercent = 6;

    protected $investedTranches;
    protected $trancheA = 0;
    protected $trancheB = 0;


    /**
     * @return array|string
     */
    public function calculate()
    {
        try {
            return $this->runCalculation();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    private function runCalculation(): array
    {
        if (!$this->checkLoanDate()) {
            throw new Exception('Invalid Date.', 422);
        }

        if ($this->isTrancheA()) {
            return $this->calculateTrancheA();
        } elseif ($this->isTrancheB()) {
            return $this->calculateTrancheB();
        }

        return [
            'TRANCHE_A' => $this->calculateTrancheA(),
            'TRANCHE_B' => $this->calculateTrancheB(),
        ];
    }

    /**
     * @return array
     */
    private function calculateTrancheA(): array
    {
        return $this->trancheA <= $this->maxAmount
            ? [
                'success' => true,
                'maxAmount' => $this->maxAmount,
                'amount' => ($this->trancheA * $this->minPercent / 100)
            ] : $this->maxAmountMessages();
    }

    /**
     * @return array
     */
    private function calculateTrancheB(): array
    {
        return $this->trancheB <= $this->maxAmount
            ? [
                'success' => true,
                'maxAmount' => $this->maxAmount,
                'amount' => ($this->trancheB * $this->maxPercent / 100)
            ] : $this->maxAmountMessages();
    }
}