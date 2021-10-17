<?php

namespace App\Models\Contracts;

class JsonBaseModel extends BaseModel
{
    private $dbFolder;
    private $tableFilePath;

    public function __construct()
    {
        $this->dbFolder = BASE_PATH . 'storage/jsondb/';
        $this->tableFilePath = $this->dbFolder . $this->table . '.json';
    }

    private function writeTable(array $data)
    {
        $dataJson = json_encode($data);

        file_put_contents($this->tableFilePath, $dataJson);
    }

    private function readTable(): array
    {
        $tableData = json_decode(file_get_contents($this->tableFilePath));
        return $tableData;
    }

    # Create (insert)
    public function create(array $newData): int
    {
        $tableData = $this->readTable();
        $tableData[] = $newData;
        $this->writeTable($tableData);
        return $newData[$this->primaryKey];
    }

    # Read (select) single|multiple
    public function find(int $id): object
    {
        $tableData = $this->readTable();
        foreach ($tableData as $row) {
            if ($row->{$this->primaryKey} == $id) {
                return $row;
            }
        }
        return null;
    }

    public function getAll(): array
    {
        return $this->readTable();
    }
    public function get(array $columns, array $where): array
    {
        return [];
    }

    # Update records
    public function update(array $data, array $where): int
    {
        return 1;
    }

    # Delete    
    public function delete(array $where): int
    {
        return 1;
    }
}
