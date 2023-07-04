<?php

namespace App\Http\Controllers;


use App\Enums\PasteStatusEnum;
use App\Http\Requests\CreatePasteRequest;
use App\Repositories\Contracts\PasteRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class PastesController extends Controller
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
     * Show Paste create form
     * @return View
     */
    public function create(): View
    {
        return view('pastes.pastes_create_form');
    }

    /**
     * Create Paste
     * @param CreatePasteRequest $request
     * @param PasteRepositoryContract $pasteRepository
     * @return RedirectResponse
     */
    public function store(CreatePasteRequest $request, PasteRepositoryContract $pasteRepository): RedirectResponse
    {
        $pasteRepository->create($request->validated());

        return redirect(route('all'));
    }

    /**
     * Delete single Paste
     * @param Request $request
     * @param PasteRepositoryContract $pasteRepository
     * @return RedirectResponse
     */
    public function delete (Request $request, PasteRepositoryContract $pasteRepository): RedirectResponse
    {
        $id = $request['id'];
        $pasteRepository->deleteById($id);

        return redirect(route('all'));
    }

    /**
     * Update Paste status to private
     * @param Request $request
     * @param PasteRepositoryContract $pasteRepository
     * @return RedirectResponse
     */
    public function update(Request $request, PasteRepositoryContract $pasteRepository): RedirectResponse
    {
        $id = $request['id'];
        $pasteRepository->updateStatus($id);

        return redirect(route('all'));
    }
}
