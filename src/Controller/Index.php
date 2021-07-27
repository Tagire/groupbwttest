<?php

namespace Groupbwt\Controller;

class Index
{
    private function renderResultArray($resultArray)
    {
        foreach ($resultArray as $resultItem) {
            echo $resultItem . "\n";
        }
    }

    public function process()
    {
        $csv = array_map('str_getcsv', file('input.csv'));
        $operationService = $this->get('operation_service');
        $result = [];

        foreach ($csv as $line) {
            $operation = $operationService->makeFromCsv($line);
            $commission = $operationService->process($operation);
            $result[] = $commission;
        }

        $this->renderResult($result);
    }
}
