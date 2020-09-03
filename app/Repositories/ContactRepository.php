<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactRepository {

    /**
     * @param int|null $id
     * @return Contact|null
     */
    public function findById(
        ?int $id
    ) : ?Contact
    {
        return Contact::find($id);
    }

    /**
     * @return Collection|null
     */
    public function getAll() : ?Collection
    {
        return Contact::query()
            ->get();
    }

    /**
     * @param int $paginateBy
     * @param int|null $page
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(int $paginateBy = 30, int $page = null) : LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $contactsPaginated */
        $contactsPaginated = Contact::query()
            ->orderBy('created_at', 'desc')
            ->paginate($paginateBy, ['*'], 'page', $page);

        return $contactsPaginated;
    }

    /**
     * @param User $user
     * @param string $name
     * @param string $phone
     * @param bool $favorite
     * @return Contact|null
     */
    public function create(
        User $user,
        string $name,
        string $phone,
        bool $favorite
    ) : ?Contact
    {
        /** @var Contact $contact */
        $contact = Contact::create([
            'user_id'   => $user->id,
            'name'      => $name,
            'phone'     => $phone,
            'favorite'  => $favorite
        ]);

        return $contact;
    }

    /**
     * @param Contact $contact
     * @param string $name
     * @param string $phone
     * @param bool $favorite
     * @return Contact
     */
    public function update(
        Contact $contact,
        string $name,
        string $phone,
        bool $favorite = false
    ) : Contact {

        /** @var Contact $contact */
        $contact->update([
            'name'      => $name,
            'phone'     => $phone,
            'favorite'  => $favorite
        ]);

        return $contact;
    }

    /**
     * @param Contact $contact
     * @throws \Exception
     */
    public function delete(Contact $contact) : void
    {
        $contact->delete();
    }
}
