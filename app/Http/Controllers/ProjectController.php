<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowBatchRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projectsQuery = Project::query();

        if ($request->query('owner')) {
            $projectsQuery->whereOwner($request->query('owner'));
        }

        return ProjectResource::collection($projectsQuery->paginate(25));
    }

    public function show($owner, $candy_machine_id)
    {
        return new ProjectResource(
            Project::whereOwner($owner)
                ->whereCandyMachineId($candy_machine_id)
                ->firstOrFail()
        );
    }

    public function batchShow(ShowBatchRequest $request)
    {
        $accountsInfo = collect($request->validated('accountsInfo'));

        $queryBuilder = Project::query();

        $accountsInfo->each(function ($accountInfo) use ($queryBuilder) {
            $queryBuilder->orWhere(function (Builder $query) use ($accountInfo) {
                $query->where('owner', '=', $accountInfo['owner'])
                    ->where('candy_machine_id', '=', $accountInfo['candyMachineId']);
            });
        });

        return ProjectResource::collection(
            $queryBuilder->get()
        );
    }
}
