<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $jsonApiResponse = [];
        $tasks = Task::all();
        foreach ($tasks as $index => $item){
            $task = [
                'type' => 'tasks',
                'id' => $item->getAttribute("id"),
                'attributes' => ['name' => $item->getAttribute('name'), 'status' => $item->getAttribute('status')]
            ];
            array_push($jsonApiResponse,$task);
        }
        return response()->json(['data' => $jsonApiResponse]);
    }

    /**
     *
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $task = new Task();
        $task->name =  $data['data']['attributes']['name'];
        $task->save();
        $task = [
            'type' => 'tasks',
            'id' => $task->id,
            'attributes' => ['name' => $task->name, 'status' => $task->status]
        ];
        return response()->json(['data' => $task]);
    }


    /**
     * @param $id
     */
    public function show($id)
    {

    }


    /**
     * @param $id
     */
    public function edit($id)
    {

    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $task = Task::find($data['data']['id']);
        $task->name = $data['data']['attributes']['name'];
        $task->status = $data['data']['attributes']['status'];
        $task->save();
        $task = [
            'type' => 'tasks',
            'id' => $data['data']['id'],
            'attributes' => ['name' => $task->name, 'status' => $task->status]
         ];
        return response()->json(['data' => $task]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $task = Task::find($id);
        $task->delete();
        $task = [
            'type' => 'tasks',
            'id' => $id,
            'attributes' => ['name' => $task->name, 'status' => $task->status]
        ];
        return response()->json(['data' => $task]);
    }
}
