<?php

namespace App\Http\Controllers;

use App\Domain\Paste\Actions\CreatePasteAction;
use App\Domain\Paste\Actions\DeletePasteAction;
use App\Domain\Paste\Actions\UpdatePasteAction;
use App\Enums\PasteStatusEnum;
use App\Http\Requests\CreatePasteRequest;
use App\Repositories\Contracts\PasteRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class PagesController extends Controller
{
    /**
     * Get all Pastes
     * @param PasteRepositoryContract $pasteRepository
     * @return View
     */
    public function all(PasteRepositoryContract $pasteRepository): View
    {
        return view('pastes.pastes_all', [
            'pastes' => $pasteRepository->get(),
            'user' => Auth::user(),
        ]);
    }

    /** Get public Pastes list
     * @param PasteRepositoryContract $pasteRepository
     * @return View
     */
    public function public(PasteRepositoryContract $pasteRepository): View
    {
        return view('pastes.pastes_public', [
            'pastes_public' => $pasteRepository->getByStatus(PasteStatusEnum::STATUS_PUBLIC),
        ]);
    }

    /** Get private Pastes list
     * @param PasteRepositoryContract $pasteRepository
     * @return View
     */
    public function private(PasteRepositoryContract $pasteRepository): View
    {
        return view('pastes.pastes_private', [
            'pastes_private' => $pasteRepository->getByStatus(PasteStatusEnum::STATUS_PRIVATE),
            'user' => Auth::user()
        ]);
    }

    /**
     * Get Pastes list by User
     * @param PasteRepositoryContract $pasteRepository
     * @return View
     */
    public function userPastes(PasteRepositoryContract $pasteRepository): View
    {
        return view('pastes.pastes_by_author', [
            'pastes' => $pasteRepository->get(),
            'user' => Auth::user()
        ]);
    }

    /**
     * Get single Paste
     * @param string $hash
     * @param PasteRepositoryContract $pasteRepository
     * @return View
     */
    public function get(string $hash, PasteRepositoryContract $pasteRepository): View
    {
        return view('pastes.paste_page', [
            'paste' => $pasteRepository->getSingle($hash),
        ]);
    }

    /**
     * Create Paste
     * @param CreatePasteRequest $request
     * @param CreatePasteAction $action
     * @return RedirectResponse
     */
    public function store(CreatePasteRequest $request, CreatePasteAction $action): RedirectResponse
    {
        //TODO:refactor
        $action->execute($request->validated());

        return redirect(route('all'));
    }

    /**
     * Delete single Paste
     * @param Request $request
     * @param DeletePasteAction $action
     * @return RedirectResponse
     */
    public function delete(Request $request, DeletePasteAction $action): RedirectResponse
    {
        //TODO:refactor
        $action->execute($request->id);

        return redirect(route('all'));
    }

    /**
     * Update Paste info
     * @param Request $request
     * @param UpdatePasteAction $action
     * @return RedirectResponse
     */
    public function update(Request $request, UpdatePasteAction $action): RedirectResponse
    {
        //TODO:refactor
        $action->execute($request->id);

        return redirect(route('all'));
    }
}
