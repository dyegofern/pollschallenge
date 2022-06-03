<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\PollStoreRequest;
use App\Http\Requests\PollVoteRequest;
use App\Http\Resources\PollResource;
use App\Http\Resources\PollStatResource;
use App\Http\Resources\PollStoreResource;
use App\Models\Option;
use App\Models\Poll;
use App\Services\PollService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PollController extends ApiBaseController
{
    private $service = null;

    public function __construct(PollService $pollService)
    {
        $this->service = $pollService;
    }

    public function get(Poll $poll): JsonResponse
    {
        try {

            if (!$poll->exists) return $this->sendNotFound();

            $this->service->view($poll);

            return $this->sendResponse(new PollResource($poll));

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }

    public function store(): JsonResponse
    {
        try {
            $storeRequest = new PollStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest($validator->errors()->first());
            }

            $poll = $this->service->create($validator->validated());

            return $this->sendResponse(new PollStoreResource($poll));

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }

    public function vote(Poll $poll)
    {
        try {

            if (!$poll->exists) return $this->sendNotFound();

            $request = new PollVoteRequest();
            $validator = Validator::make(request()->all(), $request->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest($validator->errors()->first());
            }
            $option =  Option::find($validator->validated()["option_id"]);

            $poll = $this->service->vote($option);

            return $this->sendResponse([$poll]);

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }


    public function stats(Poll $poll): JsonResponse
    {
        try {

            if (!$poll->exists) return $this->sendNotFound();

            return $this->sendResponse(new PollStatResource($poll));

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }

}
