<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Repositories\Eloquent\RequestRepository;

class BookRequestController extends BaseController
{
    protected $requestRepository;

    public function __construct(RequestRepository $requestRepository)
    {
        $this->requestRepository = $requestRepository;
        parent::__construct();
    }

    public function index ()
    {
        $requests = $this->requestRepository->paginate(5);

        return view('admin.book_request.list', compact('requests'));
    }

    public function update ($id, Request $request)
    {
        if ($request->ajax()) {
            $inputs = $request->only('request_id');
            $request = $this->requestRepository->find($inputs['request_id']);
            if ($request) {
                $request->status = !$request->status;
                $request->save();

                return response()->json([
                    'success' => true,
                    'html' => view('includes.show_list_request', [
                        'status' => $request->status,
                    ])->render(),
                ]);
            }
        }

        return response()->json(['success' => false]);
    }
}
