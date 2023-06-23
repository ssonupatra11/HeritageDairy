<?php 

namespace Sonu\HeritageDairy\Model\Classes;

use Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder;


/**
 * This class has implemented functionalities of SQLQueryBuilder interface.
 */
class MysqlQueryBuilder implements SQLQueryBuilder
{
    /**
     * @access protected
     */
    protected $query;

    /**
     * @access protected
     * 
     * @return void
     */
    protected function reset(): void
    {
        $this->query = new \stdClass();
    }

    /**
     * Build a base SELECT query.
     * 
     * @access public
     * 
     * @return \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder
     * 
     * @param string $table
     * 
     * @param array $fields
     */
    public function select(string $table, array $fields): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $this->query->type = 'select';

        return $this;
    }

    /**
     * Build a base SELECT all query.
     * @access public
     * 
     * @return SQLQueryBuilder
     * 
     * @param array $field
     * 
     * @param string $value
     * 
     * @param string $operator
     */
    public function selectAll(string $table): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base="SELECT * FROM ".$table;
        $this->query->type='select';
        return $this;
    }

    /**
     * Add a WHERE condition.
     *  @access public
     * 
     * @return SQLQueryBuilder
     * 
     * @param string $table
     * 
     * @param string $field
     * 
     * @param string $value
     */
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->query->where[] = "$field $operator $value";

        return $this;
    }

    /**
     * Build a base UPDATE query.
     * 
     * @access public
     * 
     * @return SQLQueryBuilder
     * 
     * @param string $table
     * 
     * @param string $field
     * 
     * @param string $value
     */
    public function update(string $table, string $field, string $value): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base="UPDATE ".$table." SET ".$field."=".$value." ";
        $this->query->type='update';
        return $this;
    }


    /**
     * Build a base DELETE query.
     * 
     * @access public
     * 
     * @return SQLQueryBuilder
     * 
     * @param string $table
     */
    public function delete(string $table): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base="DELETE FROM ".$table." ";
        $this->query->type='delete';
        return $this;
    }


    /**
     * Get the final query string.
     */
    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        $sql .= ";";
        return $sql;
    }
}