<?php

namespace App\Contracts;

use App\User;
use Illuminate\Http\Request;

interface RecordInterface {

	/**
	*   Get all records
	*
	*	@param	int $userId
	*   @return \Illuminate\Database\Eloquent\Collection
	*/
	function all($userId);

	/**
	*	Get a record by record ID
	*
	*	@param  int  $userId
    *	@param  int  $recordId
	*	@return App\Record
	*/
	function forId($userId, $recordId);

	/**
	*	Store a new record
	*
	*	@param \Illuminate\Http\Request $request
	*	@param int $userId
	*	@return bool
	*/
	function create(Request $request, $userId);

	/**
	*	Update a record by record ID
	*
	*	@param \Illuminate\Http\Request $request
	*	@param int $id
	*	@param int $userId
	*	@return App\Record
	*/
	function update(Request $request, $userId, $recordId);

	/**
	*	Delete a record by record ID
	*
	*	@param int $userId
	*	@param int $recordId
	*	@return bool
	*/
	function delete($userId, $recordId);





}