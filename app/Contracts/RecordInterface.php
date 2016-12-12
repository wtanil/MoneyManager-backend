<?php

namespace App\Contracts;

use App\User;
use Illuminate\Http\Request;

interface RecordRepositoryInterface {

	/**
	*   Get all records
	*
	*   @return \Illuminate\Database\Eloquent\Collection
	*/
	function all();

	/**
	*	Get a record by record ID
	*
	*	@param int $id
	*	@return App\Record
	*/
	function forId($id);

	/**
	*	Get records for a given user ID
	*
	*	@param int $id
	*   @return \Illuminate\Database\Eloquent\Collection
	*/
	function forUserId($id);

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
	function updateById(Request $request, $id, $userId);

	/**
	*	Delete a record by record ID
	*
	*	@param int $id
	*	@return bool
	*/
	function deleteById($id);





}