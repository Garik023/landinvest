<?php

namespace App;


class InvestSet extends InvestCalc
{
    /**
     * @param int $amount
     * @return InvestSet
     */
    public function setMaxAmount(int $amount): InvestSet
    {
        $this->maxAmount = $amount;

        return $this;
    }

    /**
     * @param string $start
     * @param string $end
     * @return $this
     */
    public function setDates(string $start, string $end): InvestSet
    {
        $this->startDate = $start;
        $this->endDate = $end;

        return $this;
    }

    /**
     * @param int $min
     * @param int $max
     * @return $this
     */
    public function setPercents(int $min, int $max): InvestSet
    {
        $this->minPercent = $min;
        $this->maxPercent = $max;

        return $this;
    }

    /**
     * @param array $amounts
     * @return $this
     */
    public function setAmountsToTranches(array $amounts): InvestSet
    {
        if (count($amounts) == 1 && array_key_exists(parent::TRANCHE_A, $amounts)) {
            $this->trancheA += $amounts[parent::TRANCHE_A];
        }

        if (count($amounts) == 1 && array_key_exists(parent::TRANCHE_B, $amounts)) {
            $this->trancheB += $amounts[parent::TRANCHE_B];
        }

        if (count($amounts) > 1) {
            $this->trancheA += array_key_exists(parent::TRANCHE_A, $amounts) ? $amounts[parent::TRANCHE_A] : 0;
            $this->trancheB += array_key_exists(parent::TRANCHE_B, $amounts) ? $amounts[parent::TRANCHE_B] : 0;
        }

        $this->investedTranches = array_keys($amounts);

        return $this;
    }
}