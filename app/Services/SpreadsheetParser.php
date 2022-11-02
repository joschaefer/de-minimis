<?php

declare(strict_types=1);

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\RowCellIterator;
use PhpOffice\PhpSpreadsheet\Worksheet\RowIterator;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpreadsheetParser
{
    private Worksheet $worksheet;

    /** @var string[] */
    private array $columns = [];

    private int $titleRowIndex = 1;

    /**
     * @return string[]
     */
    public static function getSupportedFileEndings(): array
    {
        return ['csv', 'ods', 'xls', 'xlsx'];
    }

    public function setTitleRowIndex(int $index): void
    {
        if ($index < 1) {
            return;
        }

        $this->titleRowIndex = $index;
    }

    /**
     * Load and use the specified spreadsheet file for parsing.
     *
     * @param string $file
     * @throws Exception
     */
    public function load(string $file): void
    {
        if (!is_readable($file)) {
            throw new Exception('Cannot load spreadsheet: ' . $file);
        }

        try {
            $reader = IOFactory::createReaderForFile($file);
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file);
            $this->worksheet = $spreadsheet->getSheet(0);
        } catch (Exception) {
            throw new Exception('Cannot read spreadsheet: ' . $file);
        }
    }

    /**
     * Load and use the specified spreadsheet file for parsing.
     *
     * @param string $name
     * @param string[] $possibleIdentifiers
     * @return bool
     */
    public function findColumn(string $name, array $possibleIdentifiers): bool
    {
        $possibleIdentifiers = array_map('mb_strtolower', $possibleIdentifiers);
        $titleRowCells = new RowCellIterator($this->worksheet, $this->titleRowIndex);

        foreach ($titleRowCells as $cell) {
            $value = mb_strtolower($cell->getFormattedValue());
            if (in_array($value, $possibleIdentifiers)) {
                $this->columns[$name] = $cell->getColumn();
                return true;
            }
        }

        return false;
    }

    /**
     * Parse the spreadsheet file and return the rows' values from the previously registered columns.
     *
     * @return string[][]
     */
    public function parse(): array
    {
        $results = [];
        $rows = new RowIterator($this->worksheet, $this->titleRowIndex+1);

        foreach ($rows as $row) {
            $result = [];

            foreach ($this->columns as $columnName => $columnIndex) {
                $result[$columnName] = trim($this->worksheet->getCell($columnIndex . $row->getRowIndex())->getFormattedValue());
            }

            if (0 !== strlen(implode($result))) {
                // Skip rows that are completely empty
                $results[] = $result;
            }
        }

        return $results;
    }
}
