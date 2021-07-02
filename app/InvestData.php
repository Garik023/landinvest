<?php


namespace App;



class InvestData extends Invest
{
    /**
     * @return int
     */
    public function getMaxAmount(): int
    {
        return $this->maxAmount;
    }

    /**
     * @return int
     */
    public function getMinPercent(): int
    {
        return $this->minPercent;
    }

    /**
     * @return int
     */
    public function getMaxPercent(): int
    {
        return $this->maxPercent;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @return array
     */
    public function getPercents(): array
    {
        return [
          'min' => $this->minPercent,
          'max' => $this->maxPercent
        ];
    }

    /**
     * @return array
     */
    public function getDates(): array
    {
        return [
            'start' => $this->startDate,
            'end' => $this->endDate
        ];
    }
}