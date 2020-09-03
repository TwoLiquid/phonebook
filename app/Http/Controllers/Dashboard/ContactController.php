<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Contact\CreateRequest;
use App\Http\Requests\Dashboard\Contact\UpdateRequest;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;

class ContactController extends BaseController
{
    /**
     * @param ContactRepository $contactRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        ContactRepository $contactRepo
    )
    {
        $contacts = $contactRepo->getAllPaginated();

        return view('dashboard.contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.contacts.create');
    }

    /**
     * @param CreateRequest $request
     * @param ContactRepository $contactRepo
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(
        CreateRequest $request,
        ContactRepository $contactRepo,
        UserRepository $userRepo
    )
    {
        $user = $userRepo->findById(auth('dashboard')->user()->id);

        if ($user === null) {
            return $this->error(
                'Не удалось найти авторизованного пользователя.',
                route('contacts.create')
            );
        }

        $contact = $contactRepo->create(
            $user,
            $request->input('name'),
            $request->input('phone'),
            $request->input('favorite') === null ? false : true
        );

        if ($contact === null) {
            return $this->error(
                'Не удалось добавить новый контакт.',
                route('contacts.create')
            );
        }

        return $this->success(
            'Новый контакт успешно добавлен.',
            route('contacts')
        );
    }

    /**
     * @param string $id
     * @param ContactRepository $contactRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function view(
        string $id,
        ContactRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        return view('dashboard.contacts.view', [
            'contact'  => $contact
        ]);
    }

    /**
     * @param string $id
     * @param ContactRepository $contactRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(
        string $id,
        ContactRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        return view('dashboard.contacts.edit', [
            'contact'  => $contact
        ]);
    }

    /**
     * @param string $id
     * @param UpdateRequest $request
     * @param ContactRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(
        string $id,
        UpdateRequest $request,
        ContactRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        $contactRepo->update(
            $contact,
            $request->input('name'),
            $request->input('phone'),
            $request->input('favorite') === null ? false : true
        );

        return $this->success(
            'Контакт успешно обновлен.',
            route('contacts.edit', $contact->id)
        );
    }

    /**
     * @param string $id
     * @param ContactRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(
        string $id,
        ContactRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        $contactRepo->delete(
            $contact
        );

        return $this->success('Контакт успешно удален.', route('contacts'));
    }
}
