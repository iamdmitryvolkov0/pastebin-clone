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

    public function __construct(private readonly PasteRepositoryContract $pasteRepository)
    {
    }

    /**
     * Get all pastes
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $paste = $this->pasteRepository->get();
        $data = [
            'paste' => $paste,
            'user' => Auth::user(),
        ];
        return response()->json($data);
    }

    /**
     * Create a new paste
     * @param CreatePasteRequest $request
     * @return JsonResponse
     */
    public function store(CreatePasteRequest $request): JsonResponse
    {
        return response()->json($this->pasteRepository->create($request->validated()));
    }

    /**
     * Get single paste
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->pasteRepository->getById($id));
    }

    /**
     * Get public pastes
     * @return JsonResponse
     */
    public function showPublic(): JsonResponse
    {
        return response()->json($this->pasteRepository->getByStatus(PasteStatusEnum::STATUS_PUBLIC));
    }

    /**
     * Get private pastes
     * @return JsonResponse
     */
    public function showPrivate(): JsonResponse
    {
        return response()->json($this->pasteRepository->getByStatus(PasteStatusEnum::STATUS_PRIVATE));
    }

    /**
     * Update paste status
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $id = $request['id'];
        $this->pasteRepository->updateStatus($id);

        return response()->json([]);
    }

    /**
     * Delete paste
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        $id = $request['id'];
        $this->pasteRepository->deleteById($id);

        return response()->json([]);
    }

    public function report(Request $request):JsonResponse
    {
        $id = $request['id'];
        $this->pasteRepository->reportById($id);

        return response()->json([]);
    }
}
