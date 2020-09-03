<?php

namespace App\Support\Transformers\Api;

use App\Models\Contact;
use App\Support\Transformers\BaseTransformer;

class ContactTransformer extends BaseTransformer
{
    /**
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact) : array
    {
        return [
            'name'      => $contact->name,
            'phone'     => $contact->phone,
            'favorite'  => $contact->favorite
        ];
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'contact';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'contacts';
    }
}
