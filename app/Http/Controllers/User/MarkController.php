<?php

namespace App\Http\Controllers\User;

use Request;
use App\Repositories\Eloquent\MarkRepository;
use App\Models\Mark;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MarkController extends Controller
{
    protected $markRepository;

    public function __construct(MarkRepository $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    public function markBook()
    {
        if(Request::ajax()) {
            $type = Request::get('type');
            $bookId = (int) Request::get('idbook');
            $value = Request::get('value');
            $mark = $this->markRepository->findMark($bookId, Auth::user()->id);

            if (!$mark) {
                $marks = [
                    'status' => $value,
                    'bookId' => $bookId,
                    'user_id' => Auth::user()->id,
                ];

                if ($this->markRepository->create($marks)) {
                    return 1;
                }
            }

            $updateMark = [
                'status' => $value,
            ];
            $this->markRepository->update($updateMark, $mark->id);

            return 2;
        }
    }
}

