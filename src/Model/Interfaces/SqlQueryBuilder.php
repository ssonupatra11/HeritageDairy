<?php 

namespace Sonu\HeritageDairy\Model\Interfaces;

/**
 * Interface having different functionalities to create a sql query.
 */
interface SQLQueryBuilder
{
    /**
     * @access public
     * 
     * @return \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder
     * 
     * @param string $table
     * 
     * @param array $fields
     */
    public function select(string $table, array $fields): SQLQueryBuilder;

    /**
     * @access public
     * 
     * @return \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder
     * 
     * @param string $table
     */
    public function selectAll(string $table):SQLQueryBuilder;

    /**
     * @access public
     * 
     * @return \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder
     * 
     * @param array $field
     * 
     * @param string $value
     * 
     * @param string $operator
     */
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    /**
     * @access public
     * 
     * @return \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder
     * 
     * @param string $table
     * 
     * @param string $field
     * 
     * @param string $value
     */
    public function update(string $table,string $field,string $value):SQLQueryBuilder;

    /**
     * @access public
     * 
     * @return \Sonu\HeritageDairy\Model\Interfaces\SQLQueryBuilder
     * 
     * @param string $table
     */
    public function delete(string $table):SQLQueryBuilder;

    /**
     * @access public
     * 
     * @return string
     * 
     */
    public function getSQL(): string;
}