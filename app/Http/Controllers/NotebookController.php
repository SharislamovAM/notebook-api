<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidParamsException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\Notebook\StoreRequest;
use App\Http\Requests\Notebook\UpdateRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class NotebookController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $note = Note::filter(Note::all())->paginate(10);
            return response()->json($note);
        } catch (\Exception $e) {
            return response()->json([
                'data' => 'Ошибка получения записей',
            ], 400);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $this->add($request->all());
            return response()->json([
                'data' => 'Запись добавлена'
            ], 201);
        } catch (InvalidParamsException $e) {
            return response()->json([
                'data' => 'Неверные значения параметров'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'data' => 'Ошибка добавления записи'
            ], 400);
        }
    }

    /**
     * @param $id
     * @return NotebookResource|JsonResponse
     */
    public function show($id)
    {
        try {
            $data = Note::findOrFail($id);
            return NotebookResource::make($data);
        } catch (NotFoundException $e) {
            return response()->json([
                'data' => 'Нет такой записи'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'data' => 'Ошибка получения записи'
            ], 400);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $note = Note::findOrFail($id);
            $data = $this->validateUpdate($request->all());
            $note->update($data);
            return response()->json([
                'data' => 'Запись обновлена'
            ]);
        } catch (InvalidParamsException $e) {
            return response()->json([
                'data' => 'Неверные значения параметров'
            ], 422);
        } catch (NotFoundException $e) {
            return response()->json([
                'data' => 'Нет такой записи'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'data' => 'Ошибка обновления записи'
            ], 400);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $note = Note::findOrFail($id);
            $note->delete();
            return response()->json([
                'data' => 'Контакт удален'
            ]);
        } catch (NotFoundException $e) {
            return response()->json([
                'data' => 'Нет такой записи'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'data' => 'Ошибка обновления записи'
            ], 400);
        }
    }

    /**
     * @throws InvalidParamsException
     * @throws ValidationException
     */
    public function add($request)
    {
        $validator = Validator::make($request, StoreRequest::rules());
        if ($validator->fails()) {
            throw new InvalidParamsException();
        }
        return Note::create($validator->validated());
    }

    /**
     * @throws InvalidParamsException
     * @throws ValidationException
     */
    public function validateUpdate($request): array
    {
        $validator = Validator::make($request, UpdateRequest::rules());
        if ($validator->fails()) {
            throw new InvalidParamsException();
        }
        return $validator->validated();
    }
}
