<?php

namespace App;

trait Helpers
{
    /**
     * @return bool
     */
    private function isTrancheA(): bool
    {
        return count($this->investedTranches) == 1 && in_array(static::TRANCHE_A, $this->investedTranches);
    }

    /**
     * @return bool
     */
    private function isTrancheB(): bool
    {
        return count($this->investedTranches) == 1 && in_array(static::TRANCHE_B, $this->investedTranches);
    }

    /**
     * @return bool
     */
    private function checkLoanDate(): bool
    {
        return strtotime(date(static::DATE_FORMAT)) >= strtotime($this->startDate)
            && strtotime(date(static::DATE_FORMAT)) <= strtotime($this->endDate);
    }

    /**
     * @return array
     */
    private function maxAmountMessages(): array
    {
        return [
            'success' => false,
            'maxAmount' => $this->maxAmount,
            'message' => 'Тhe loan amount exceeds the maximum allowable value.'
        ];
    }
}