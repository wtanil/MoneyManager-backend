<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Contracts\RecordInterface;
use App\Http\Requests\CreateRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

class RecordApiController extends Controller
{

    /**
     * The record repository instance.
     *
     * @var RecordInterface
     */
    protected $record;

    /**
     * Create a new controller instance.
     *
     * @param  RecordInterface $product
     * @return void
     */
    public function __construct(RecordInterface $record) {
        $this->record = $record;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        return response()->json($this->record->all($userId), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecordRequest $request, $userId)
    {
        $temp = $this->record->create($request, $userId);

        if ($temp) {
            return response()->json(['message' => 'Create success'], 201);
        }

        return response()->json(['message' => 'Create failed'], 400);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @param  int  $recordId
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $recordId)
    {
        return response()->json($this->record->forId($userId, $recordId), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $userId
     * @param  int  $recordId
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordRequest $request, $userId, $recordId)
    {
        $temp = $this->record->update($request, $userId, $recordId);

        if ($temp) {
            return response()->json(['message' => 'Update success'], 200);
        }

        return response()->json(['message' => 'Update failed'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param int $userId
    *   @param int $recordId
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, $recordId)
    {
        $temp = $this->record->delete($userId, $recordId);

        if ($temp) {
            return response()->json(['message' => 'Delete success'], 200);
        }
        return response()->json(['message' => 'Delete failed'], 400);
    }
}
