<?php

namespace Libraries;

use Database\Database;

abstract class Model
{
    public $table_name = '';
    public Database $db;

    public function initialize()
    {
        $this->db = new Database();
    }

    public function insert($data)
    {
        try {
            $this->initialize();
            $attributes = '';
            $placeholders = '';
            $values = [];

            foreach ($data as $key => $value) {
                $attributes .= "$key,";
                $placeholders .= ":$key,";
                $values[":$key"] = $value;
            }

            $attributes = rtrim($attributes, ',');
            $placeholders = rtrim($placeholders, ',');

            $stmt = $this->db->prepare("INSERT INTO {$this->table_name} ($attributes) VALUES ($placeholders)");

            foreach ($values as $placeholder => $value) {
                $stmt->bindValue($placeholder, $value);
            }

            $stmt->execute();
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }

    public function update($data, $condition, $column = 'id')
    {
        try {
            $this->initialize();
            if (isset($data['email'])) {
                $stmt = $this->db->prepare("SELECT id FROM {$this->table_name} WHERE email = :email AND id != :id");
                $stmt->bindValue(':email', $data['email']);
                $stmt->bindValue(':id', $condition);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    throw new \Exception('Email already in use by another user.');
                }
            }

            $setPart = '';
            $values = [];

            foreach ($data as $key => $value) {
                $setPart .= "`$key` = :$key, ";
                $values[":$key"] = $value;
            }

            $setPart = rtrim($setPart, ', ');

            $sql = "UPDATE {$this->table_name} SET $setPart WHERE $column = :$column";
            $stmt = $this->db->prepare($sql);
            $values[":$column"] = $condition;

            foreach ($values as $placeholder => $value) {
                $stmt->bindValue($placeholder, $value);
            }

            $stmt->execute();
            echo "sukses";
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }

    public function findAllById($column, $id)
    {
        try {
            $this->initialize();
            $stmt = $this->db->prepare("SELECT * FROM " . $this->table_name . " WHERE $column = :id");
            $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }

    public function find($column, $id)
    {
        try {
            $this->initialize();
            $stmt = $this->db->prepare("SELECT * FROM " . $this->table_name . " WHERE $column = :id");
            $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }

    public function selectAll()
    {
        try {
            $this->initialize();
            $stmt = $this->db->prepare("SELECT * FROM " . $this->table_name);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->initialize();
            $stmt = $this->db->prepare("DELETE FROM {$this->table_name} WHERE id = :id");
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "User deleted successfully.";
            } else {
                echo "No user found with the provided ID.";
            }
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }

    public function join($foreign_table, string $primary_key, string $foreign_key)
    {
        try {
            $this->initialize();

            $query = "
            SELECT * 
            FROM `{$this->table_name}` 
            LEFT JOIN `{$foreign_table}` 
            ON `{$this->table_name}`.`{$primary_key}` = `{$foreign_table}`.`{$foreign_key}`
        ";

            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }


    public function joinWhere($destination_table, string $primary_key, string $foreign_key, string $column, $condition)
    {
        try {
            $this->initialize();

            $query = "
            SELECT * 
            FROM {$destination_table} 
            LEFT JOIN {$this->table_name} 
            ON {$this->table_name}.{$primary_key} = {$destination_table}.{$foreign_key} 
            WHERE {$destination_table}.{$column} = :condition
        ";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':condition', $condition);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (empty($result)) {
                return null; 
            }

            if (count($result) === 0) {
                return $result[0]; 
            }

            return $result;
        } catch (\Exception $e) {
            echo "Maaf error: " . $e->getMessage();
        }
    }
}
