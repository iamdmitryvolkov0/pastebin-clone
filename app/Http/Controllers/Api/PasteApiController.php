<?php

namespace App\Http\Controllers\Api;

use App\Enums\PasteStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePasteRequest;
use App\Repositories\Contracts\PasteRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasteApiController extends Controller
{
    /**
     * Get all pastes
     * @param PasteRepositoryContract $pasteRepository
     * @return JsonResponse
     */
    public function index(PasteRepositoryContract $pasteRepository): JsonResponse
    {
        $data = [
            'paste' => $pasteRepository->get(),
            'user' => Auth::user(),
        ];
        return response()->json($data);
    }

    /**
     * Create a new paste
     * @param PasteRepositoryContract $pasteRepository
     * @param CreatePasteRequest $request
     * @return JsonResponse
     */
    public function store(PasteRepositoryContract $pasteRepository, CreatePasteRequest $request): JsonResponse
    {
        //TODO: не прилетает дата
        return response()->json($pasteRepository->create($request->validated()));
    }

    /**
     * Get single paste
     * @param int $id
     * @param PasteRepositoryContract $pasteRepository
     * @return JsonResponse
     */
    public function show(int $id, PasteRepositoryContract $pasteRepository): JsonResponse
    {
        return response()->json($pasteRepository->getById($id));
    }

    /**
     * Get public pastes
     * @param PasteRepositoryContract $pasteRepository
     * @return JsonResponse
     */
    public function showPublic(PasteRepositoryContract $pasteRepository): JsonResponse
    {
        //TODO: не заходит, пытается выдать show
        return response()->json($pasteRepository->getByStatus(PasteStatusEnum::STATUS_PUBLIC));
    }

    /**
     * Get private pastes
     * @param PasteRepositoryContract $pasteRepository
     * @return JsonResponse
     */
    public function showPrivate(PasteRepositoryContract $pasteRepository): JsonResponse
    {
        //TODO: не заходит, пытается выдать show
        return response()->json($pasteRepository->getByStatus(PasteStatusEnum::STATUS_PRIVATE));
    }


    /**
     * Update paste status
     * @param Request $request
     * @param PasteRepositoryContract $pasteRepository
     * @return JsonResponse
     */
    public function update(Request $request, PasteRepositoryContract $pasteRepository): JsonResponse
    {
        $id = $request['id'];
        $pasteRepository->updateStatus($id);

        return response()->json([
            'message' => 'Updated',
        ]);
    }

    /**
     * Delete paste
     * @param Request $request
     * @param PasteRepositoryContract $pasteRepository
     * @return JsonResponse
     */
    public function delete(Request $request, PasteRepositoryContract $pasteRepository): JsonResponse
    {
        $id = $request['id'];
        $pasteRepository->deleteById($id);

        return response()->json([
            'message' => 'Deleted',
        ]);
    }

    public function report(Request $request, PasteRepositoryContract $pasteRepository):JsonResponse
    {
        $id = $request['id'];
        $pasteRepository->reportById($id);

        return response()->json([
            'message' => 'Reported',
        ]);
    }
}
