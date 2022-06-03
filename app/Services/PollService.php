<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Address;
use App\Models\Option;
use App\Models\Poll;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PollService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    public function all(): Collection
    {

        return $this->buildQuery()->get();
    }

    public function find(int $id): ?Poll
    {
        return Poll::find($id);
    }

    public function create(array $data): Model
    {
        return DB::transaction(function () use ($data) {

            $model = new Poll();
            $model->description = $data["poll_description"];
            $model->save();

            array_map(function ($option) use ($model) {
                $optionModel = new Option();
                $optionModel->description = $option;
                $optionModel->poll_id = $model->id;
                $optionModel->save();
                return $optionModel;
            }, $data["options"]);

            return $model;
        });
    }


    public function delete(Poll $model): ?bool
    {
        return $model->delete();
    }

    public function view(Poll $model): bool
    {
        return DB::transaction(function () use ($model) {
            $model->views++;
            return $model->save();
        });
    }


    public function vote(Option $model): bool
    {
        return DB::transaction(function () use ($model) {
            $model->votes += 1;
            return $model->save();
        });
    }


    private function buildQuery(): Builder
    {

        $query = Poll::query();

        return $query;
    }

}
