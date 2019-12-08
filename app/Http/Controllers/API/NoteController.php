<?php

namespace App\Http\Controllers\API;

use App\Note;
use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Requests\NoteStoreRequest;
use App\Http\Controllers\API\BaseResponceController;

class NoteController extends BaseResponceController {

    protected $user;

    /**
     * TaskController constructor.
     */
    public function __construct() {
        $this->user = auth()->user();
    }


    public function index(){
        $notes = $this->user->notes()->get(['id','title'])->toArray();
        return $this->sendResponse($notes, 'OK');
    }

    
    public function show($id) {
        $note = $this->user->notes()->find($id);

        if (!$note) {
            return $this->sendError('Note with id ' . $id . ' cannot be found.', 401);
        }

        return $this->sendResponse($note, 'OK');;
    }

    public function store(NoteStoreRequest $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;

        if ($this->user->notes()->save($note)) {
            return $this->sendResponse($note, 'OK');
        }
        else {
            return $this->sendError('Could not save note', 401);
        }
    }

    public function update(NoteStoreRequest $request, $id) {
        $note = $this->user->notes()->find($id);

        if (!$note) {
            return $this->sendError('Could not find this note', 400);
        }

        $updated = $note->fill($request->all())->save();

        if ($updated) {
            return $this->sendResponse($updated, 'OK');
        } 
        else {
            return $this->sendError('Could not update this note', 500);
        }
    }

    public function destroy($id) {
        $note = $this->user->notes()->find($id);

        if (!$note) {
            return $this->sendError('Could not find this note', 400);
        }

        if ($note->delete()) {
            return $this->sendResponse([], 'OK');
        } 
        else {
            return $this->sendError('Could not delete this note', 400);
        }
    }








}
