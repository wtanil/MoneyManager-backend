<?php

namespace App\Repositories;

use App\Record;
use App\User;
use Illuminate\Http\Request;
use App\Contracts\RecordInterface;

class RecordRepository implements RecordInterface {

	/**
	*   Get App\User object for ID
	*
	*	@param \Illuminate\Http\Request $request
	*   @return App\User
	*/
	function getUser($id) {

		return User::find($id);

	}

	/**
	*   Get all records
	*
	*	@param	int $userId
	*   @return [App\Record]
	*/
	function all($userId) {

		return $this->getUser($userId)
			->records()
			->orderBy('created_at', 'asc')
        	->get();
	}

	/**
	*	Get a record by record ID
	*
	*	@param  int  $userId
    *	@param  int  $recordId
	*	@return App\Record
	*/
	function forId($userId, $recordId) {

		return $this->getUser($userId)
			->records()
			->where('id', $recordId)
        	->first();
	}

	/**
	*	Store a new record
	*
	*	@param \Illuminate\Http\Request $request
	*	@param int $userId
	*	@return bool
	*/
	function create(Request $request, $userId) {

		$record = new Record();

		$record->user_id = $userId;
		$record->title = $request->input('title');
		$record->currency = $request->input('currency');
		$record->note = $request->input('note');
		$record->amount = $request->input('amount');
		$record->is_income = $request->input('isIncome');
		$record->is_loan = $request->input('isLoan');
		$record->date = $request->input('date');
		$record->update_date = $request->input('updateDate');

		return $record->save();

	}

	/**
	*	Update a record by record ID
	*
	*	@param \Illuminate\Http\Request $request
	*	@param int $userId
	*	@param int $recordId
	*	@return App\Record
	*/
	function update(Request $request, $userId, $recordId) {

		$record = $this->forId($userId, $recordId);

		$record->title = $request->input('title');
		$record->currency = $request->input('currency');
		$record->note = $request->input('note');
		$record->amount = $request->input('amount');
		$record->is_income = $request->input('isIncome');
		$record->is_loan = $request->input('isLoan');
		$record->date = $request->input('date');
		$record->update_date = $request->input('updateDate');

		return $record->save();
	}

	/**
	*	Delete a record by record ID
	*
	*	@param int $userId
	*	@param int $recordId
	*	@return bool
	*/
	function delete($userId, $recordId) {
		$record = $this->forId($userId, $recordId);
		return $record->delete();
		
	}

}